<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVotingsRequest;
use App\Http\Requests\UpdateVotingsRequest;
use App\Repositories\VotingsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VotingsController extends AppBaseController
{
    /** @var  VotingsRepository */
    private $votingsRepository;

    public function __construct(VotingsRepository $votingsRepo)
    {
        $this->votingsRepository = $votingsRepo;
    }

    /**
     * Display a listing of the Votings.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->votingsRepository->pushCriteria(new RequestCriteria($request));
        $votings = $this->votingsRepository->all();

        return view('votings.index')
            ->with('votings', $votings);
    }

    /**
     * Show the form for creating a new Votings.
     *
     * @return Response
     */
    public function create()
    {
        return view('votings.create');
    }

    /**
     * Store a newly created Votings in storage.
     *
     * @param CreateVotingsRequest $request
     *
     * @return Response
     */
    public function store(CreateVotingsRequest $request)
    {
        $input = $request->all();

        $votings = $this->votingsRepository->create($input);

        Flash::success('Votings saved successfully.');

        return redirect(route('votings.index'));
    }

    /**
     * Display the specified Votings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $votings = $this->votingsRepository->findWithoutFail($id);

        if (empty($votings)) {
            Flash::error('Votings not found');

            return redirect(route('votings.index'));
        }

        return view('votings.show')->with('votings', $votings);
    }

    /**
     * Show the form for editing the specified Votings.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $votings = $this->votingsRepository->findWithoutFail($id);

        if (empty($votings)) {
            Flash::error('Votings not found');

            return redirect(route('votings.index'));
        }

        return view('votings.edit')->with('votings', $votings);
    }

    /**
     * Update the specified Votings in storage.
     *
     * @param  int              $id
     * @param UpdateVotingsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVotingsRequest $request)
    {
        $votings = $this->votingsRepository->findWithoutFail($id);

        if (empty($votings)) {
            Flash::error('Votings not found');

            return redirect(route('votings.index'));
        }

        $votings = $this->votingsRepository->update($request->all(), $id);

        Flash::success('Votings updated successfully.');

        return redirect(route('votings.index'));
    }

    /**
     * Remove the specified Votings from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $votings = $this->votingsRepository->findWithoutFail($id);

        if (empty($votings)) {
            Flash::error('Votings not found');

            return redirect(route('votings.index'));
        }

        $this->votingsRepository->delete($id);

        Flash::success('Votings deleted successfully.');

        return redirect(route('votings.index'));
    }
}
