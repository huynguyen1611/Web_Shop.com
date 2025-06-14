<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAllpaginate()
    {
        return  User::paginate(15);
    }
}
