<?php

namespace App\Http\Controllers\Backend\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Backend\Company\CreateCompany;
use App\Http\Requests\Backend\Company\UpdateCompany;
use App\Repositories\Backend\CompanyRepository;
use App\Events\Backend\Company\CompanyCreated;
use App\Events\Backend\Company\CompanyUpdated;
use App\Events\Backend\Company\CompanyDeleted;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Company;

class CompanyController extends Controller
{
    /** @var $companyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     *
     * @param  Request $request
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */

    public function index(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $data = $this->companyRepository->getPaginatedAndSortable(10);

        return view('backend.companies.index')->with('companies', $data);
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Response | \Illuminate\View\View|Response
     */
    public function create()
    {
        return view('backend.companies.create');
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param CreateCompany $request
     *
     * @return Response | \Illuminate\View\View|Response
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CreateCompany $request)
    {
        $obj = $this->companyRepository->create(
            $request->only(["name1134341", "sms"])
        );

        event(new CompanyCreated($obj));
        return redirect()
            ->route('admin.company.index')
            ->withFlashSuccess(__('alerts.frontend.company.saved'));
    }

    /**
     * Display the specified Company.
     *
     * @param Company $company
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function show(Company $company)
    {
        return view('backend.companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param Company $company
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function edit(Company $company)
    {
        return view('backend.companies.edit')->with('company', $company);
    }

    /**
     * Update the specified Company in storage.
     *
     * @param UpdateCompany $request
     *
     * @param Company $company
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UpdateCompany $request, Company $company)
    {
        $obj = $this->companyRepository->update($request->all(), $company);

        event(new CompanyUpdated($obj));
        return redirect()
            ->route('admin.company.index')
            ->withFlashSuccess(__('alerts.frontend.company.updated'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @param Company $company
     * @return \Illuminate\View\View|Response
     * @internal param int $id
     *
     */
    public function destroy(Company $company)
    {
        $obj = $this->companyRepository->delete($company);
        event(new CompanyDeleted($obj));
        return redirect()
            ->back()
            ->withFlashSuccess(__('alerts.frontend.company.deleted'));
    }
}
