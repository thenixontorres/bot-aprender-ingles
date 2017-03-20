<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateplanesRequest;
use App\Http\Requests\UpdateplanesRequest;
use App\Repositories\planesRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class planesController extends InfyOmBaseController
{
    /** @var  planesRepository */
    private $planesRepository;

    public function __construct(planesRepository $planesRepo)
    {
        $this->planesRepository = $planesRepo;
    }

    /**
     * Display a listing of the planes.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->planesRepository->pushCriteria(new RequestCriteria($request));
        $planes = $this->planesRepository->all();

        return view('planes.index')
            ->with('planes', $planes);
    }

    /**
     * Show the form for creating a new planes.
     *
     * @return Response
     */
    public function create()
    {
        return view('planes.create');
    }

    /**
     * Store a newly created planes in storage.
     *
     * @param CreateplanesRequest $request
     *
     * @return Response
     */
    public function store(CreateplanesRequest $request)
    {
        $input = $request->all();

        $planes = $this->planesRepository->create($input);

        Flash::success('planes saved successfully.');

        return redirect(route('planes.index'));
    }

    /**
     * Display the specified planes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $planes = $this->planesRepository->findWithoutFail($id);

        if (empty($planes)) {
            Flash::error('planes not found');

            return redirect(route('planes.index'));
        }

        return view('planes.show')->with('planes', $planes);
    }

    /**
     * Show the form for editing the specified planes.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $planes = $this->planesRepository->findWithoutFail($id);

        if (empty($planes)) {
            Flash::error('planes not found');

            return redirect(route('planes.index'));
        }

        return view('planes.edit')->with('planes', $planes);
    }

    /**
     * Update the specified planes in storage.
     *
     * @param  int              $id
     * @param UpdateplanesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateplanesRequest $request)
    {
        $planes = $this->planesRepository->findWithoutFail($id);

        if (empty($planes)) {
            Flash::error('planes not found');

            return redirect(route('planes.index'));
        }

        $planes = $this->planesRepository->update($request->all(), $id);

        Flash::success('planes updated successfully.');

        return redirect(route('planes.index'));
    }

    /**
     * Remove the specified planes from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $planes = $this->planesRepository->findWithoutFail($id);

        if (empty($planes)) {
            Flash::error('planes not found');

            return redirect(route('planes.index'));
        }

        $this->planesRepository->delete($id);

        Flash::success('planes deleted successfully.');

        return redirect(route('planes.index'));
    }
}
