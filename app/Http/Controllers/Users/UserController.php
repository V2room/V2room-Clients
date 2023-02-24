<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Repositories\BaseRepository;

class UserController extends Controller
{
    private BaseRepository $repository;

    public function show(User $model)
    {
        return $model;
    }
}
