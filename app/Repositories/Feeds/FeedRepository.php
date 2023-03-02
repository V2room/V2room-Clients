<?php

namespace App\Repositories\Feeds;

use App\Repositories\BasePaginateRepository;
use Illuminate\Database\Eloquent\Model;

class FeedRepository extends BasePaginateRepository
{

    public function store(array $attribute): Model
    {
        $attribute['user_id'] = $this->authService->getUser()->getKey();
        $model = parent::store(collect($attribute)->only(['title', 'status', 'user_id'])->toArray());
        return $model;
    }
}