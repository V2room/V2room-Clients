<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use V2room\Models\Users\User;
use App\Repositories\BasePaginateRepository;

class UserController extends Controller
{
    private BasePaginateRepository $repository;

    public function show(User $model)
    {
        return $model;
    }
}
