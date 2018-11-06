<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNominateRequest;
use App\Http\Requests\UpdateNominateRequest;
use App\Repositories\NominateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NominateController extends AppBaseController
{
    /** @var  NominateRepository */
    private $nominateRepository;

    public function __construct(NominateRepository $nominateRepo)
    {
        $this->nominateRepository = $nominateRepo;
    }

    /**
     * Display a listing of the Nominate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nominateRepository->pushCriteria(new RequestCriteria($request));
        $nominates = $this->nominateRepository->all();

        return view('nominates.index')
            ->with('nominates', $nominates);
    }

    /**
     * Show the form for creating a new Nominate.
     *
     * @return Response
     */
    public function create()
    {
        return view('nominates.create');
    }

    /**
     * Store a newly created Nominate in storage.
     *
     * @param CreateNominateRequest $request
     *
     * @return Response
     */
    public function store(CreateNominateRequest $request)
    {
        $input = $request->all();

        $nominate = $this->nominateRepository->create($input);

        Flash::success('Nominate saved successfully.');

        return redirect(route('nominates.index'));
    }

    /**
     * Display the specified Nominate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nominate = $this->nominateRepository->findWithoutFail($id);

        if (empty($nominate)) {
            Flash::error('Nominate not found');

            return redirect(route('nominates.index'));
        }

        return view('nominates.show')->with('nominate', $nominate);
    }

    /**
     * Show the form for editing the specified Nominate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nominate = $this->nominateRepository->findWithoutFail($id);

        if (empty($nominate)) {
            Flash::error('Nominate not found');

            return redirect(route('nominates.index'));
        }

        return view('nominates.edit')->with('nominate', $nominate);
    }

    /**
     * Update the specified Nominate in storage.
     *
     * @param  int              $id
     * @param UpdateNominateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNominateRequest $request)
    {
        $nominate = $this->nominateRepository->findWithoutFail($id);

        if (empty($nominate)) {
            Flash::error('Nominate not found');

            return redirect(route('nominates.index'));
        }

        $nominate = $this->nominateRepository->update($request->all(), $id);

        Flash::success('Nominate updated successfully.');

        return redirect(route('nominates.index'));
    }

    /**
     * Remove the specified Nominate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nominate = $this->nominateRepository->findWithoutFail($id);

        if (empty($nominate)) {
            Flash::error('Nominate not found');

            return redirect(route('nominates.index'));
        }

        $this->nominateRepository->delete($id);

        Flash::success('Nominate deleted successfully.');

        return redirect(route('nominates.index'));
    }
}
