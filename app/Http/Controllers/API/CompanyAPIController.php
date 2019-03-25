<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompanyAPIRequest;
use App\Http\Requests\API\UpdateCompanyAPIRequest;
use App\Models\Company;
use App\Repositories\Backend\CompanyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

/**
 * Class CompanyAPIController
 * @package App\Http\Controllers\API
 */
class CompanyAPIController extends Controller
{
    /** @var  CompanyRepository */
    private $companyRepository;
    /** @var  CompanyModel */
    private $companyModel;

    public function __construct(
        CompanyRepository $companyRepo,
        Company $company
    ) {
        $this->companyRepository = $companyRepo->skipCache(true);
        $this->companyModel = $company;
    }

    /**
     * Display a listing of the Company.
     * GET|HEAD /companies
     *
     * @param Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function index(Request $request)
    {
        $companies = $this->companyRepository->all();
        return response()->json([
            'data' => $companies,
            'Companys retrieved successfully'
        ]);
    }

    /**
     * Store a newly created Company in storage.
     * POST /companies
     *
     * @param CreateCompanyAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function store(CreateCompanyAPIRequest $request)
    {
        $input = $request->all();
        $this->companyRepository->create($input);
        return response()->json(['Company saved successfully']);
    }

    /**
     * Display the specified Company.
     * GET|HEAD /companies/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function show($id)
    {
        /** @var Company $company */
        //   $company = $this->companyRepository->findByField('id',$id);
        $company = $this->companyModel->find($id);
        return response()->json([
            'data' => $company,
            'Company retrieved successfully'
        ]);
    }

    /**
     * Update the specified Company in storage.
     * PUT/PATCH /companies/{id}
     *
     * @param  int $id
     * @param UpdateCompanyAPIRequest $request
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function update($id, UpdateCompanyAPIRequest $request)
    {
        $input = $request->all();
        /** @var Company $company */
        $company = $this->companyModel->find($id);
        $company = $this->companyRepository->update($company, $input);
        return response()->json(['Company updated successfully']);
    }

    /**
     * Remove the specified Company from storage.
     * DELETE /companies/{id}
     *
     * @param  int $id
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Company $company */
        $company = $this->companyModel->find($id);
        $company->delete();

        return response()->json('Company deleted successfully');
    }
}
