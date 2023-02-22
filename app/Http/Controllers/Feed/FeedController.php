<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Library\LaravelSupports\app\Database\Repositories\PaginateRepository;
use App\Models\Rooms\Room;
use LaravelSupports\ViewModels\BasicViewModel;

class FeedController extends Controller
{
    protected array $prefix = ['feed'];
    private PaginateRepository $repository;

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        // return $this->repository->paginate(10);
        return $this->buildView('index', new BasicViewModel());
    }

    public function show(Room $model)
    {
        return $model;
    }
}
