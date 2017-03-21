<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecontratoRequest;
use App\Http\Requests\UpdatecontratoRequest;
use App\Repositories\contratoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\contrato;
use App\Models\estado;
use App\Models\municipio;
use App\Models\planes;
use App\Models\clausula;
use App\Models\persona;

class contratoController extends InfyOmBaseController
{
    /** @var  contratoRepository */
    private $contratoRepository;

    public function __construct(contratoRepository $contratoRepo)
    {
        $this->contratoRepository = $contratoRepo;
    }

    /**
     * Display a listing of the contrato.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contratoRepository->pushCriteria(new RequestCriteria($request));
        $contratos = $this->contratoRepository->all();


        return view('contratos.index')
            ->with('contratos', $contratos);
    }

    public function individuales(Request $request)
    {
        $contratos = contrato::where('tipo_contrato','Individual')->get();
        
        return view('contratos.index')
            ->with('contratos', $contratos);
    }

    public function colectivos(Request $request)
    {
        $contratos = contrato::where('tipo_contrato','Colectivo')->get();
        
        return view('contratos.index')
            ->with('contratos', $contratos);
    }

    /**
     * Show the form for creating a new contrato.
     *
     * @return Response
     */
    public function create()
    {
        return view('contratos.create');
    }

    public function individuales_create()
    {   
        $estados = estado::all();
        $municipios = municipio::all();
        $planes = planes::all();
        $clausulas = clausula::all();
        return view('contratos.individuales_create')
        ->with('planes', $planes)
        ->with('municipios', $municipios)
        ->with('estados', $estados)
        ->with('clausulas', $clausulas);
    }

    /**
     * Store a newly created contrato in storage.
     *
     * @param CreatecontratoRequest $request
     *
     * @return Response
     */
    public function store(CreatecontratoRequest $request)
    {
        $input = $request->all();

        if ($request->tipo_contrato == 'Individual'){
            $contrato = new contrato();    
            $contrato->fecha_inicio = $request->fecha_inicio;
            $contrato->tipo_contrato = $request->tipo_contrato;
            $contrato->fecha_inicio = $request->fecha_inicio;
            $contrato->clausula_id = $request->clausula_id;
            $contrato->plan_id = $request->plan_id;
            $contrato->tiempo_pago = $request->tiempo_pago;
            $contrato->estado = 'Activo';
            $contrato->save();

            $contrato_id = $contrato->id;

            $persona = new persona();
            $persona->nombre = $request->nombre; 
            $persona->apellido = $request->apellido;
            $persona->cedula = $request->cedula; 
            $persona->sexo = $request->sexo;        
            $persona->fecha_nac = $request->fecha_nac; 
            $persona->parentesco = 'Titular';
            $persona->telefono = $request->telefono;
            $persona->municipio_id = $request->municipio_id;         
            $persona->direccion = $request->direccion;
            $persona->contrato_id = $contrato_id;
            $persona->save();         

            Flash::success('Contrato Individual registrado con exito.');
            return redirect()->route('contratos.individuales');
            }
    }

    /**
     * Display the specified contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Flash::error('contrato not found');

            return redirect(route('contratos.index'));
        }

        return view('contratos.show')->with('contrato', $contrato);
    }

    /**
     * Show the form for editing the specified contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Flash::error('contrato not found');

            return redirect(route('contratos.index'));
        }

        return view('contratos.edit')->with('contrato', $contrato);
    }

    /**
     * Update the specified contrato in storage.
     *
     * @param  int              $id
     * @param UpdatecontratoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecontratoRequest $request)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Flash::error('contrato not found');

            return redirect(route('contratos.index'));
        }

        $contrato = $this->contratoRepository->update($request->all(), $id);

        Flash::success('contrato updated successfully.');

        return redirect(route('contratos.index'));
    }

    /**
     * Remove the specified contrato from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contrato = $this->contratoRepository->findWithoutFail($id);

        if (empty($contrato)) {
            Flash::error('contrato not found');

            return redirect(route('contratos.index'));
        }

        $this->contratoRepository->delete($id);

        Flash::success('contrato deleted successfully.');

        return redirect(route('contratos.index'));
    }
}
