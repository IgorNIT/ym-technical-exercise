<?php

namespace Modules\Company\Services;

use Modules\Company\DataTransferObjects\CompanyDTO;
use Modules\Company\Models\Company;
use Modules\Company\Repositories\CompanyRepository;
use Modules\User\Models\User;
use Prettus\Validator\Exceptions\ValidatorException;

class CompanyService
{
   public function __construct(protected CompanyRepository $companyRepository)
   {
   }

    /**
     * Create Company
     * @throws ValidatorException
     */
    public function createCompany(CompanyDTO $companyDTO): Company
    {
        return $this->companyRepository->create((array) $companyDTO);
    }

    public function getUerCompanies(int $user_id)
    {
        return $this->companyRepository->usersCompanies($user_id)->paginate(15);
    }
}
