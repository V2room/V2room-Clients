<?php

namespace App\Services\Auth;

use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class AuthService extends BaseService
{
    public function getUser(): \Illuminate\Contracts\Auth\Authenticatable
    {
        return Auth::user();
    }
}