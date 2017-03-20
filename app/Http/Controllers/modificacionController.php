<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatemodificacionRequest;
use App\Http\Requests\UpdatemodificacionRequest;
use App\Repositories\modificacionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class modificacionController extends InfyOmBaseController
{
    /** @var  modificacionRepository */
    private $modificacionRepository;

    public function __construct(modificacionRepository $modificacionRepo)
    {
        $this->modificacionRepository = $modificacionRepo;
    }

    /**
     * Display a listing of the modificacion.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->modificacionRepository->pushCriteria(new RequestCriteria($request));
        $modificacions = $this->modificacionRepository->all();

        return view('modificacions.index')
            ->with('modificacions', $modificacions);
    }

    /**
     * Show the form for creating a new modificacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('modificacions.create');
    }

    /**
     * Store a newly created modificacion in storage.
     *
     * @param CreatemodificacionRequest $request
     *
     * @return Response
     */
    public function store(CreatemodificacionRequest $request)
    {
        $input = $request->all();

        $modificacion = $this->modificacionRepository->create($input);

        Flash::success('modificacion saved successfully.');

        return redirect(route('modificacions.index'));
    }

    /**
     * Display the specified modificacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $modificacion = $this->modificacionRepository->findWithoutFail($id);

        if (empty($modificacion)) {
            Flash::error('modificacion not found');

            return redirect(route('modificacions.index'));
        }

        return view('modificacions.show')->with('modificacion', $modificacion);
    }

    /**
     * Show the form for editing the specified modificacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $modificacion = $this->modificacionRepository->findWithoutFail($id);

        if (empty($modificacion)) {
            Flash::error('modificacion not found');

            return redirect(route('modificacions.index'));
        }

        return view('modificacions.edit')->with('modificacion', $modificacion);
    }

    /**
     * Update the specified modificacion in storage.
     *
     * @param  int              $id
     * @param UpdatemodificacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemodificacionRequest $request)
    {
        $modificacion = $this->modificacionRepository->findWithoutFail($id);

        if (empty($modificacion)) {
            Flash::error('modificacion not found');

            return redirect(route('modificacions.index'));
        }

        $modificacion = $this->modificacionRepository->update($request->all(), $id);

        Flash::success('modificacion updated successfully.');

        return redirect(route('modificacions.index'));
    }

    /**
     * Remove the specified modificacion from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $modificacion = $this->modificacionRepository->findWithoutFail($id);

        if (empty($modificacion)) {
            Flash::error('modificacion not found');

            return redirect(route('modificacions.index'));
        }

        $this->modificacionRepository->delete($id);

        Flash::success('modificacion deleted successfully.');

        return redirect(route('modificacions.index'));
    }
}
