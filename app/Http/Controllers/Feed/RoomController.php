<?php

namespace App\Http\Controllers\Feed;

use App\Enum\Room\RoomStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Feed\FeedRequest;
use App\Http\VIewModels\Feed\FeedViewModel;
use App\Repositories\BasePaginateRepository;
use V2room\Models\Rooms\Room;

class RoomController extends Controller
{
    protected array $prefix = ['feed'];

    public function __construct(private readonly BasePaginateRepository $repository)
    {
        parent::__construct();
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    protected function before()
    {
        $this->viewModel = new FeedViewModel();
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $this->viewModel->setData($this->repository->paginate(10));
        return $this->buildView('index');
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return $this->buildView('create');
    }

    public function store(FeedRequest $request)
    {
        $data = $request->validated();
        return $this->basicTransaction(function () use ($data) {
            $data['status'] = RoomStatus::active->name;
            $this->repository->store($data);
            return $this->redirectRouteWithMessage('success', 'feed.index');
        });
    }

    public function show($id): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $model = $this->repository->showById($id, ['user']);
        $this->viewModel->setData($model);
        return $this->buildView('show');
    }

    public function update(FeedRequest $request, Room $model)
    {
        $this->repository->update($model, $request->validated());
    }

    public function delete(Room $model)
    {
        $this->repository->delete($model);
    }
}
