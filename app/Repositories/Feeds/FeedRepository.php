<?php

namespace App\Repositories\Feeds;

use App\Repositories\BasePaginateRepository;
use App\Services\Auth\AuthService;
use Illuminate\Database\Eloquent\Model;

class FeedRepository extends BasePaginateRepository
{
    public function __construct(protected Model $model, protected FeedTypeRepository $feedTypeRepository) {}

    public function store(array $attribute): Model
    {
        $this->feedTypeRepository->storeIfNotExists($attribute['type'], [
            'code' => $attribute['type'],
        ]);

        return parent::store($attribute);
    }
}