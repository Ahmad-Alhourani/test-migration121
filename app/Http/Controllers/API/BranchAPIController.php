<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBranchAPIRequest;
use App\Http\Requests\API\UpdateBranchAPIRequest;
use App\Models\Branch;
use App\Repositories\Backend\BranchRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Company;

/**
 * Class BranchAPIController
 * @package App\Http\Controllers\API
 */
class BranchAPIController extends Controller
{
    /** @var  BranchRepository */
    private $branchRepository;
    /** @var  BranchModel */
    private $branchModel;

    public function __construct(BranchRepository $branchRepo, Branch $branch)
    {
        $this->branchRepository = $branchRepo->skipCache(true);
        $this->branchModel = $branch;
    }

    /**
     * Display a listing of the Branch.
     * GET|HEAD /branches
     *
     * @param Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $branches = $this->branchRepository->all();
        return response()->json([
            'data' => $branches,
            'Branches retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Branch in storage.
     * POST /branches
     *
     * @param CreateBranchAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreateBranchAPIRequest $request)
    {
        $input = $request->all();
        $this->branchRepository->create($input);
        return response()->json(['Branch saved successfully']);
    }

    /**
     * Display the specified Branch.
     * GET|HEAD /branches/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        /** @var Branch $branch */
        //   $branch = $this->branchRepository->findByField('id',$id);
        $branch = $this->branchModel->find($id);
        return response()->json([
            'data' => $branch,
            'Branch retrieved successfully'
        ]);
    }

    /**
     * Update the specified Branch in storage.
     * PUT/PATCH /branches/{id}
     *
     * @param  int $id
     * @param UpdateBranchAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function update($id, UpdateBranchAPIRequest $request)
    {
        $input = $request->all();
        /** @var Branch $branch */
        $branch = $this->branchModel->find($id);
        $branch = $this->branchRepository->update($branch, $input);
        return response()->json(['Branch updated successfully']);
    }

    /**
     * Remove the specified Branch from storage.
     * DELETE /branches/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Branch $branch */
        $branch = $this->branchModel->find($id);
        $branch->delete();

        return response()->json('Branch deleted successfully');
    }
}
