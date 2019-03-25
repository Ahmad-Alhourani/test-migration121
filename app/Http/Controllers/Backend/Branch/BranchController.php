<?php

namespace App\Http\Controllers\Backend\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Branch\CreateBranch;
use App\Http\Requests\Backend\Branch\UpdateBranch;
use App\Repositories\Backend\BranchRepository;
use App\Events\Backend\Branch\BranchCreated;
use App\Events\Backend\Branch\BranchUpdated;
use App\Events\Backend\Branch\BranchDeleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Branch;

use App\Models\Company;

class BranchController extends Controller
{
    /** @var $branchRepository */
    private $branchRepository;

    public function __construct(BranchRepository $branchRepo)
    {
        $this->branchRepository = $branchRepo;
    }

    /**
     * Display a listing of the Branch.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->branchRepository->pushCriteria(new RequestCriteria($request));
        $data = $this->branchRepository->getPaginatedAndSortable(10);

        return view('backend.branches.index')->with('branches', $data);
    }

    /**
     * Show the form for creating a new Branch.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        $companies = Company::all();
        $selectedCompany = Company::first() ? Company::first()->_id : 0;

        return view(
            'backend.branches.create',
            compact("companies", "selectedCompany")
        );
    }

    /**
     * Store a newly created Branch in storage.
     *
     * @param CreateBranch $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateBranch $request)
    {
        $obj = $this->branchRepository->create(
            $request->only(["name", "company_id"])
        );

        event(new BranchCreated($obj));
        return redirect()
            ->route('admin.branch.index')
            ->withFlashSuccess(__('alerts.frontend.branch.saved'));
    }

    /**
     * Display the specified Branch.
     *
     * @param Branch $branch
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Branch $branch)
    {
        return view('backend.branches.show')->with('branch', $branch);
    }

    /**
     * Show the form for editing the specified Branch.
     *
     * @param Branch $branch
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Branch $branch)
    {
        $companies = Company::all();
        $selectedCompany = $branch->company_id;

        return view(
            'backend.branches.edit',
            compact("companies", "selectedCompany")
        )->with('branch', $branch);
    }

    /**
     * Update the specified Branch in storage.
     *
     * @param UpdateBranch $request
     *
     * @param Branch $branch
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateBranch $request, Branch $branch)
    {
        $obj = $this->branchRepository->update($request->all(), $branch);

        event(new BranchUpdated($obj));
        return redirect()
            ->route('admin.branch.index')
            ->withFlashSuccess(__('alerts.frontend.branch.updated'));
    }

    /**
     * Remove the specified Branch from storage.
     *
     * @param Branch $branch
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Branch $branch)
    {
        $obj = $this->branchRepository->delete($branch);
        event(new BranchDeleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.branch.deleted'));
    }
}
