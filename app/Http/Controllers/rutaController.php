<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreaterutaRequest;
use App\Http\Requests\UpdaterutaRequest;
use App\Repositories\rutaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\contrato;
use App\Models\empleado;
use Carbon\Carbon;
use PDF;

class rutaController extends InfyOmBaseController
{
    /** @var  rutaRepository */
    private $rutaRepository;

    public function __construct(rutaRepository $rutaRepo)
    {
        $this->rutaRepository = $rutaRepo;
    }

    /**
     * Display a listing of the ruta.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rutaRepository->pushCriteria(new RequestCriteria($request));
        $rutas = $this->rutaRepository->all();

        return view('rutas.index')
            ->with('rutas', $rutas);
    }

    /**
     * Show the form for creating a new ruta.
     *
     * @return Response
     */
    public function create()
    {
        $empleados = empleado::where('tipo', 'Cobrador')->get();
        return view('rutas.create')
        ->with('empleados', $empleados);
    }

    /**
     * Store a newly created ruta in storage.
     *
     * @param CreaterutaRequest $request
     *
     * @return Response
     */
    public function store(CreaterutaRequest $request)
    {
        $input = $request->all();

        $ruta = $this->rutaRepository->create($input);

        Flash::success('Ruta guardada con exito.');

        return redirect(route('rutas.index'));
    }

    /**
     * Display the specified ruta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {   
        $fecha_actual = carbon::now();
        $ruta = $this->rutaRepository->findWithoutFail($id);
        
        if (empty($ruta)) {
            Flash::error('Ruta no encontrada.');

            return redirect(route('rutas.index'));
        }

        $pdf = PDF::loadView('pdfs.routes', [
            'ruta' => $ruta,
            'fecha_actual' => $fecha_actual,
        ]);

        return $pdf->setPaper('letter', 'landscape')->stream('Ruta: '.$id.'.pdf');

        /*return view('rutas.show')
        ->with('ruta', $ruta)
        ->with('fecha_actual', $fecha_actual);*/
    }

    /**
     * Show the form for editing the specified ruta.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ruta = $this->rutaRepository->findWithoutFail($id);
        $empleados = empleado::where('tipo', 'Cobrador')->get();
        if (empty($ruta)) {
            Flash::error('Ruta no encontrada');

            return redirect(route('rutas.index'));
        }

        return view('rutas.edit')
            ->with('ruta', $ruta)
            ->with('empleados', $empleados);
    }

    /**
     * Update the specified ruta in storage.
     *
     * @param  int              $id
     * @param UpdaterutaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterutaRequest $request)
    {
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            Flash::error('Ruta no encontrada.');

            return redirect(route('rutas.index'));
        }

        $ruta = $this->rutaRepository->update($request->all(), $id);

        Flash::success('Ruta actualizada con exito.');

        return redirect(route('rutas.index'));
    }

    /**
     * Remove the specified ruta from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ruta = $this->rutaRepository->findWithoutFail($id);

        if (empty($ruta)) {
            Flash::error('Ruta no encontrada.');

            return redirect(route('rutas.index'));
        }

        $contratos = count(contrato::where('ruta_id', $id)->get());

        if ($contratos > 0) {
            Flash::error('Esta Ruta aun posee contratos.');
        }   
        $this->rutaRepository->delete($id);

        Flash::success('ruta deleted successfully.');

        return redirect(route('rutas.index'));
    }
}
