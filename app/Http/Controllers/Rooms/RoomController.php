<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Library\LaravelSupports\app\Database\Repositories\PaginateRepository;
use App\Models\Rooms\Room;

class RoomController extends Controller
{
    private PaginateRepository $repository;

    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
        return $this->repository->paginate(10);
    }

    public function show(Room $model)
    {
        return $model;
    }
}
