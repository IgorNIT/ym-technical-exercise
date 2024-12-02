<?php

namespace Modules\User\Repositories;

use Modules\User\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{

    public function model(): string
    {
        return User::class;
    }
}
