<?php

namespace Modules\Company\Repositories;

use Illuminate\Support\Collection;
use Modules\Company\Models\Company;
use Prettus\Repository\Eloquent\BaseRepository;

class CompanyRepository extends BaseRepository {
     public function model(): string
    {
        return Company::class;
    }

    public function usersCompanies(int $userId)
    {
        return $this->where(['author_user_id' => $userId]);
    }

}
