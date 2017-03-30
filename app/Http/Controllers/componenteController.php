<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatecomponenteRequest;
use App\Http\Requests\UpdatecomponenteRequest;
use App\Repositories\componenteRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\componente;
use App\Models\planes;

class componenteController extends InfyOmBaseController
{
    /** @var  componenteRepository */
    private $componenteRepository;

    public function __construct(componenteRepository $componenteRepo)
    {
        $this->componenteRepository = $componenteRepo;
    }

    /**
     * Display a listing of the componente.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->componenteRepository->pushCriteria(new RequestCriteria($request));
        $componentes = $this->componenteRepository->all();

        return view('componentes.index')
            ->with('componentes', $componentes);
    }

    /**
     * Show the form for creating a new componente.
     *
     * @return Response
     */
    public function create()
    {
        return view('componentes.create');
    }

    /**
     * Store a newly created componente in storage.
     *
     * @param CreatecomponenteRequest $request
     *
     * @return Response
     */
    public function store(CreatecomponenteRequest $request)
    {
        $input = $request->all();

        $componente = $this->componenteRepository->create($input);

        Flash::success('Componente registrado con exito.');

        return redirect(route('planes.index'));
    }

    /**
     * Display the specified componente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $componente = $this->componenteRepository->findWithoutFail($id);

        if (empty($componente)) {
            Flash::error('componente not found');

            return redirect(route('componentes.index'));
        }

        return view('componentes.show')->with('componente', $componente);
    }

    /**
     * Show the form for editing the specified componente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $componente = $this->componenteRepository->findWithoutFail($id);

        if (empty($componente)) {
            Flash::error('componente not found');

            return redirect(route('componentes.index'));
        }

        return view('componentes.edit')->with('componente', $componente);
    }

    /**
     * Update the specified componente in storage.
     *
     * @param  int              $id
     * @param UpdatecomponenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecomponenteRequest $request)
    {
        $componente = $this->componenteRepository->findWithoutFail($id);

        if (empty($componente)) {
            Flash::error('componente not found');

            return redirect(route('componentes.index'));
        }

        $componente = $this->componenteRepository->update($request->all(), $id);

        Flash::success('Componente actualizado con exito.');

        return redirect(route('planes.index'));
    }

    /**
     * Remove the specified componente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $componente = $this->componenteRepository->findWithoutFail($id);

        if (empty($componente)) {
            Flash::error('componente not found');

            return redirect(route('componentes.index'));
        }

        $this->componenteRepository->delete($id);

        Flash::success('Componente borrado con exito.');

        return redirect(route('planes.index'));
    }
}
