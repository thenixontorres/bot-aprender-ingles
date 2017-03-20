<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateestadoRequest;
use App\Http\Requests\UpdateestadoRequest;
use App\Repositories\estadoRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class estadoController extends InfyOmBaseController
{
    /** @var  estadoRepository */
    private $estadoRepository;

    public function __construct(estadoRepository $estadoRepo)
    {
        $this->estadoRepository = $estadoRepo;
    }

    /**
     * Display a listing of the estado.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->estadoRepository->pushCriteria(new RequestCriteria($request));
        $estados = $this->estadoRepository->all();

        return view('estados.index')
            ->with('estados', $estados);
    }

    /**
     * Show the form for creating a new estado.
     *
     * @return Response
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Store a newly created estado in storage.
     *
     * @param CreateestadoRequest $request
     *
     * @return Response
     */
    public function store(CreateestadoRequest $request)
    {
        $input = $request->all();

        $estado = $this->estadoRepository->create($input);

        Flash::success('estado saved successfully.');

        return redirect(route('estados.index'));
    }

    /**
     * Display the specified estado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            Flash::error('estado not found');

            return redirect(route('estados.index'));
        }

        return view('estados.show')->with('estado', $estado);
    }

    /**
     * Show the form for editing the specified estado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            Flash::error('estado not found');

            return redirect(route('estados.index'));
        }

        return view('estados.edit')->with('estado', $estado);
    }

    /**
     * Update the specified estado in storage.
     *
     * @param  int              $id
     * @param UpdateestadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateestadoRequest $request)
    {
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            Flash::error('estado not found');

            return redirect(route('estados.index'));
        }

        $estado = $this->estadoRepository->update($request->all(), $id);

        Flash::success('estado updated successfully.');

        return redirect(route('estados.index'));
    }

    /**
     * Remove the specified estado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $estado = $this->estadoRepository->findWithoutFail($id);

        if (empty($estado)) {
            Flash::error('estado not found');

            return redirect(route('estados.index'));
        }

        $this->estadoRepository->delete($id);

        Flash::success('estado deleted successfully.');

        return redirect(route('estados.index'));
    }
}
