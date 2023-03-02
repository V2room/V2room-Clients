<?php

namespace App\Repositories;

use App\Services\Auth\AuthService;
use Illuminate\Database\Eloquent\Model;

class BasePaginateRepository extends \LaravelSupports\Database\Repositories\PaginateRepository
{
    public function __construct(protected Model $model, protected AuthService $authService) {}

}