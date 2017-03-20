<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateempresaRequest;
use App\Http\Requests\UpdateempresaRequest;
use App\Repositories\empresaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class empresaController extends InfyOmBaseController
{
    /** @var  empresaRepository */
    private $empresaRepository;

    public function __construct(empresaRepository $empresaRepo)
    {
        $this->empresaRepository = $empresaRepo;
    }

    /**
     * Display a listing of the empresa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empresaRepository->pushCriteria(new RequestCriteria($request));
        $empresas = $this->empresaRepository->all();

        return view('empresas.index')
            ->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new empresa.
     *
     * @return Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created empresa in storage.
     *
     * @param CreateempresaRequest $request
     *
     * @return Response
     */
    public function store(CreateempresaRequest $request)
    {
        $input = $request->all();

        $empresa = $this->empresaRepository->create($input);

        Flash::success('empresa saved successfully.');

        return redirect(route('empresas.index'));
    }

    /**
     * Display the specified empresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('empresa not found');

            return redirect(route('empresas.index'));
        }

        return view('empresas.show')->with('empresa', $empresa);
    }

    /**
     * Show the form for editing the specified empresa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('empresa not found');

            return redirect(route('empresas.index'));
        }

        return view('empresas.edit')->with('empresa', $empresa);
    }

    /**
     * Update the specified empresa in storage.
     *
     * @param  int              $id
     * @param UpdateempresaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateempresaRequest $request)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('empresa not found');

            return redirect(route('empresas.index'));
        }

        $empresa = $this->empresaRepository->update($request->all(), $id);

        Flash::success('empresa updated successfully.');

        return redirect(route('empresas.index'));
    }

    /**
     * Remove the specified empresa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $empresa = $this->empresaRepository->findWithoutFail($id);

        if (empty($empresa)) {
            Flash::error('empresa not found');

            return redirect(route('empresas.index'));
        }

        $this->empresaRepository->delete($id);

        Flash::success('empresa deleted successfully.');

        return redirect(route('empresas.index'));
    }
}
