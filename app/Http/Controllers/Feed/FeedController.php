<?php

namespace App\Http\Controllers\Feed;

use App\Http\Controllers\Controller;
use App\Http\Requests\Feed\FeedRequest;
use App\Http\VIewModels\Feed\FeedViewModel;
use App\Library\LaravelSupports\app\Database\Repositories\PaginateRepository;
use App\Models\Rooms\Room;
use App\Services\Auth\AuthService;
use Throwable;

class FeedController extends Controller
{
    protected array $prefix = ['feed'];

    public function __construct(private readonly PaginateRepository $repository)
    {
        parent::__construct();
    }

    protected function before()
    {
        $this->viewModel = new FeedViewModel();
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        // return $this->repository->paginate(10);
        return $this->buildView('index');
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return $this->buildView('create');
    }

    public function store(FeedRequest $request, AuthService $authService)
    {
        $data = $request->validated();
        return $this->runTransaction(function () use ($data, $authService) {
            $data['user_id'] = $authService->getUser()->getKey();
            $this->repository->store(collect($data)->except(['content', 'category'])->toArray());
            return $this->redirectRouteWithMessage('success', 'feed.index');
        }, function (Throwable $throwable) {
            dd($throwable);
        });
    }

    public function show(Room $model): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $model = $this->repository->show($model);
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
