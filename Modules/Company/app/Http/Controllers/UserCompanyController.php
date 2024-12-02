<?php

namespace Modules\Company\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Company\Http\Requests\CreateCompanyRequest;
use Modules\Company\Services\CompanyService;
use Prettus\Validator\Exceptions\ValidatorException;

class UserCompanyController extends Controller
{

    /**
     * Get list of user companies
     * @return JsonResponse
     */
    public function index(CompanyService $companyService): JsonResponse
    {
       return response()->json(['companies' => $companyService->getUerCompanies(auth()->id())]);
    }

    /**
     * Create company
     * @throws ValidatorException
     */
    public function store(CreateCompanyRequest $createCompanyRequest, CompanyService $companyService): JsonResponse
    {
        return response()->json(['company' => $companyService->createCompany($createCompanyRequest->toDTO())]);
    }
}
