<?php

namespace App\Repositories\Users;


use App\Repositories\BasePaginateRepository;
use V2room\Models\BaseModel;

class UserRepository extends BasePaginateRepository
{
    public function getCsUser() : BaseModel
    {
        return $this->model->where('email', config('mail.cs_mail'))->first();
    }

}