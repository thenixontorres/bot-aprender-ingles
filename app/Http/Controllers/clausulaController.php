<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateclausulaRequest;
use App\Http\Requests\UpdateclausulaRequest;
use App\Repositories\clausulaRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class clausulaController extends InfyOmBaseController
{
    /** @var  clausulaRepository */
    private $clausulaRepository;

    public function __construct(clausulaRepository $clausulaRepo)
    {
        $this->clausulaRepository = $clausulaRepo;
    }

    /**
     * Display a listing of the clausula.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clausulaRepository->pushCriteria(new RequestCriteria($request));
        $clausulas = $this->clausulaRepository->all();

        return view('clausulas.index')
            ->with('clausulas', $clausulas);
    }

    /**
     * Show the form for creating a new clausula.
     *
     * @return Response
     */
    public function create()
    {
        return view('clausulas.create');
    }

    /**
     * Store a newly created clausula in storage.
     *
     * @param CreateclausulaRequest $request
     *
     * @return Response
     */
    public function store(CreateclausulaRequest $request)
    {
        $input = $request->all();

        $clausula = $this->clausulaRepository->create($input);

        Flash::success('clausula saved successfully.');

        return redirect(route('clausulas.index'));
    }

    /**
     * Display the specified clausula.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $clausula = $this->clausulaRepository->findWithoutFail($id);

        if (empty($clausula)) {
            Flash::error('clausula not found');

            return redirect(route('clausulas.index'));
        }

        return view('clausulas.show')->with('clausula', $clausula);
    }

    /**
     * Show the form for editing the specified clausula.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $clausula = $this->clausulaRepository->findWithoutFail($id);

        if (empty($clausula)) {
            Flash::error('clausula not found');

            return redirect(route('clausulas.index'));
        }

        return view('clausulas.edit')->with('clausula', $clausula);
    }

    /**
     * Update the specified clausula in storage.
     *
     * @param  int              $id
     * @param UpdateclausulaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateclausulaRequest $request)
    {
        $clausula = $this->clausulaRepository->findWithoutFail($id);

        if (empty($clausula)) {
            Flash::error('clausula not found');

            return redirect(route('clausulas.index'));
        }

        $clausula = $this->clausulaRepository->update($request->all(), $id);

        Flash::success('clausula updated successfully.');

        return redirect(route('clausulas.index'));
    }

    /**
     * Remove the specified clausula from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $clausula = $this->clausulaRepository->findWithoutFail($id);

        if (empty($clausula)) {
            Flash::error('clausula not found');

            return redirect(route('clausulas.index'));
        }

        $this->clausulaRepository->delete($id);

        Flash::success('clausula deleted successfully.');

        return redirect(route('clausulas.index'));
    }
}
