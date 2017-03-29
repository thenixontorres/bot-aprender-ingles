<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatepagoRequest;
use App\Http\Requests\UpdatepagoRequest;
use App\Repositories\pagoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\contrato;
use App\Models\pago;

class pagoController extends InfyOmBaseController
{
    /** @var  pagoRepository */
    private $pagoRepository;

    public function __construct(pagoRepository $pagoRepo)
    {
        $this->pagoRepository = $pagoRepo;
    }

    /**
     * Display a listing of the pago.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pagoRepository->pushCriteria(new RequestCriteria($request));
        $pagos = $this->pagoRepository->all();

        return view('pagos.index')
            ->with('pagos', $pagos);
    }

    /**
     * Show the form for creating a new pago.
     *
     * @return Response
     */
    public function create()
    {   
        return view('pagos.create');
    }

    /**
     * Store a newly created pago in storage.
     *
     * @param CreatepagoRequest $request
     *
     * @return Response
     */
    public function store(CreatepagoRequest $request)
    {
        $input = $request->all();

        $pago = $this->pagoRepository->create($input);

        Flash::success('Pago Registrado con Exito.');

        return redirect()->back();
    }

    /**
     * Display the specified pago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contrato_id = $id;
        
        $contrato = contrato::where('id',$contrato_id)->get();
        $contrato = $contrato->first();
        
        if ($contrato->tiempo_pago == "Mensual") {
           $cuotas = '6';
        }elseif ($contrato->tiempo_pago == "Quincenal") {
            $cuotas = '12';
        }else{
            $cuotas = '24';
        }

        $pagos = pago::where('contrato_id',$contrato_id)->get();
        return view('pagos.show')
        ->with('pagos', $pagos)
        ->with('cuotas', $cuotas)
        ->with('contrato', $contrato);
    }

    /**
     * Show the form for editing the specified pago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            Flash::error('pago not found');

            return redirect(route('pagos.index'));
        }

        return view('pagos.edit')->with('pago', $pago);
    }

    /**
     * Update the specified pago in storage.
     *
     * @param  int              $id
     * @param UpdatepagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepagoRequest $request)
    {
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            Flash::error('pago not found');

            return redirect(route('pagos.index'));
        }

        $pago = $this->pagoRepository->update($request->all(), $id);

        Flash::success('pago updated successfully.');

        return redirect(route('pagos.index'));
    }

    /**
     * Remove the specified pago from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pago = $this->pagoRepository->findWithoutFail($id);

        if (empty($pago)) {
            Flash::error('pago not found');

            return redirect(route('pagos.index'));
        }

        $this->pagoRepository->delete($id);

        Flash::success('pago deleted successfully.');

        return redirect(route('pagos.index'));
    }
}
