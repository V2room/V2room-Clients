<?php

namespace App\Repositories;

use App\Services\Auth\AuthService;
use Illuminate\Database\Eloquent\Model;

class BasePaginateRepository extends \App\Library\LaravelSupports\app\Database\Repositories\PaginateRepository
{
    public function __construct(protected Model $model, protected AuthService $authService) {}

}