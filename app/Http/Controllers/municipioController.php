<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemunicipioRequest;
use App\Http\Requests\UpdatemunicipioRequest;
use App\Repositories\municipioRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\municipio;
use App\Models\estado;


class municipioController extends InfyOmBaseController
{
    /** @var  municipioRepository */
    private $municipioRepository;

    public function __construct(municipioRepository $municipioRepo)
    {
        $this->municipioRepository = $municipioRepo;
    }

    /**
     * Display a listing of the municipio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->municipioRepository->pushCriteria(new RequestCriteria($request));
        $municipios = $this->municipioRepository->all();

        return view('municipios.index')
            ->with('municipios', $municipios);
    }

    /**
     * Show the form for creating a new municipio.
     *
     * @return Response
     */
    public function create()
    {   
        $estados = estado::all();
        return view('municipios.create')
        ->with('estados',$estados);
    }

    /**
     * Store a newly created municipio in storage.
     *
     * @param CreatemunicipioRequest $request
     *
     * @return Response
     */
    public function store(CreatemunicipioRequest $request)
    {
        $input = $request->all();

        $municipio = $this->municipioRepository->create($input);

        Flash::success('Municipio registrado con exito.');

        return redirect(route('municipios.index'));
    }

    /**
     * Display the specified municipio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $municipio = $this->municipioRepository->findWithoutFail($id);

        if (empty($municipio)) {
            Flash::error('municipio not found');

            return redirect(route('municipios.index'));
        }

        return view('municipios.show')->with('municipio', $municipio);
    }

    /**
     * Show the form for editing the specified municipio.
     *
     * @param  int $id
     *
     * @return Response

     */

    public function dropdown(Request $request){
        $municipios = municipio::where('estado_id',$request->option)->get();
        return response()->json($municipios->toArray());
    }

    public function edit($id)
    {
        $municipio = $this->municipioRepository->findWithoutFail($id);

        if (empty($municipio)) {
            Flash::error('municipio not found');

            return redirect(route('municipios.index'));
        }
        $estados = estado::all();
        return view('municipios.edit')->with('municipio', $municipio)->with('estados',$estados);
;
    }

    /**
     * Update the specified municipio in storage.
     *
     * @param  int              $id
     * @param UpdatemunicipioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemunicipioRequest $request)
    {
        $municipio = $this->municipioRepository->findWithoutFail($id);

        if (empty($municipio)) {
            Flash::error('municipio not found');

            return redirect(route('municipios.index'));
        }

        $municipio = $this->municipioRepository->update($request->all(), $id);

        Flash::success('Municipio Actualizado con exito.');

        return redirect(route('municipios.index'));
    }

    /**
     * Remove the specified municipio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $municipio = $this->municipioRepository->findWithoutFail($id);

        if (empty($municipio)) {
            Flash::error('municipio not found');

            return redirect(route('municipios.index'));
        }

        $this->municipioRepository->delete($id);

        Flash::success('municipio deleted successfully.');

        return redirect(route('municipios.index'));
    }
}
