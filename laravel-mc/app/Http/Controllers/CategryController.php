<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategryRequest;
use App\Http\Requests\UpdateCategryRequest;
use App\Repositories\CategryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategryController extends AppBaseController
{
    /** @var  CategryRepository */
    private $categryRepository;

    public function __construct(CategryRepository $categryRepo)
    {
        $this->categryRepository = $categryRepo;
    }

    /**
     * Display a listing of the Categry.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categryRepository->pushCriteria(new RequestCriteria($request));
        $categries = $this->categryRepository->all();

        return view('categries.index')
            ->with('categries', $categries);
    }

    /**
     * Show the form for creating a new Categry.
     *
     * @return Response
     */
    public function create()
    {
        return view('categries.create');
    }

    /**
     * Store a newly created Categry in storage.
     *
     * @param CreateCategryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategryRequest $request)
    {
        $input = $request->all();

        $categry = $this->categryRepository->create($input);

        Flash::success('Categry saved successfully.');

        return redirect(route('categries.index'));
    }

    /**
     * Display the specified Categry.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $categry = $this->categryRepository->findWithoutFail($id);

        if (empty($categry)) {
            Flash::error('Categry not found');

            return redirect(route('categries.index'));
        }

        return view('categries.show')->with('categry', $categry);
    }

    /**
     * Show the form for editing the specified Categry.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $categry = $this->categryRepository->findWithoutFail($id);

        if (empty($categry)) {
            Flash::error('Categry not found');

            return redirect(route('categries.index'));
        }

        return view('categries.edit')->with('categry', $categry);
    }

    /**
     * Update the specified Categry in storage.
     *
     * @param  int              $id
     * @param UpdateCategryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategryRequest $request)
    {
        $categry = $this->categryRepository->findWithoutFail($id);

        if (empty($categry)) {
            Flash::error('Categry not found');

            return redirect(route('categries.index'));
        }

        $categry = $this->categryRepository->update($request->all(), $id);

        Flash::success('Categry updated successfully.');

        return redirect(route('categries.index'));
    }

    /**
     * Remove the specified Categry from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $categry = $this->categryRepository->findWithoutFail($id);

        if (empty($categry)) {
            Flash::error('Categry not found');

            return redirect(route('categries.index'));
        }

        $this->categryRepository->delete($id);

        Flash::success('Categry deleted successfully.');

        return redirect(route('categries.index'));
    }
}
