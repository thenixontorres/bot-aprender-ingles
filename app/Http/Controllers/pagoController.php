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

        $contrato = contrato::find($request->contrato_id);

        if ($contrato->tiempo_pago == 'Mensual') {
            $cant_cuotas = 6;
        }elseif ($contrato->tiempo_pago == 'Quincenal') {
            $cant_cuotas = 12;
        }else{
            $cant_cuotas = 24;
        }

        $monto = $contrato->monto_total/$cant_cuotas;

        $cuotas_pagadas = pago::where('contrato_id', $request->contrato_id)->get();
        $cuotas_pagadas = count($cuotas_pagadas);
        $numero_cuota = $cuotas_pagadas+1;

        if ($numero_cuota > $cant_cuotas) {
            Flash::error('Ya este contrato a pagado todas sus cuotas.');
            return redirect()->back();
        }

        $fecha_inicio = $contrato->fecha_inicio;
        $fecha_inicio = explode("/", $fecha_inicio);
        $dia_inicio = $fecha_inicio[0];
        $mes_inicio = $fecha_inicio[1];
        $ano_inicio = $fecha_inicio[2];

        $mes = $mes_inicio+$cuotas_pagadas;

        if($mes >  12){
            $mes = $mes-12;
            $ano_inicio = $ano_inicio+1;
        }

        $concepto =  array($dia_inicio, $mes, $ano_inicio);  
        $concepto = implode("/", $concepto);

        $pago = new pago();
        $pago->monto = $monto;
        $pago->numero_cuota =$numero_cuota;
        $pago->tipo_pago = $request->tipo_pago;
        $pago->contrato_id = $request->contrato_id;
        $pago->concepto = $concepto;
        $pago->save();

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
            Flash::error('Pago no encontrado.');

            return redirect()->back();
        }
        if ($pago->contrato->tiempo_pago == "Mensual") {
           $cuotas = '6';
        }elseif ($pago->contrato->tiempo_pago == "Quincenal") {
            $cuotas = '12';
        }else{
            $cuotas = '24';
        }
        return view('pagos.edit')->with('pago', $pago)->with('cuotas', $cuotas);
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
            Flash::error('Pago no encontrado.');

            return redirect(route('pagos.show',[$pago->contrato->id]));
        }

        $pago = $this->pagoRepository->update($request->all(), $id);

        Flash::success('Pago actualizado con exito.');

        return redirect(route('pagos.show',[$pago->contrato->id]));
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
            Flash::error('Pago not encontrado');

            return redirect()->back();
        }

        $this->pagoRepository->delete($id);

        Flash::success('Pago borrado con exito.');

        return redirect(route('pagos.show',[$pago->contrato->id]));
    }
}
