<?php

namespace App\Providers;

use App\Http\Controllers\Feed\FeedController;
use App\Repositories\BasePaginateRepository;
use App\Repositories\Feeds\FeedRepository;
use App\Repositories\Feeds\FeedTypeRepository;
use App\Repositories\Users\UserRepository;
use App\Services\Auth\AuthService;
use Illuminate\Support\ServiceProvider;
use V2room\Models\Feeds\Feed;
use V2room\Models\Feeds\FeedType;
use V2room\Models\Users\User;

class ControllerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService();
        });

        $this->buildRepository();
        $this->buildController();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {}

    private function buildRepository()
    {
        $this->app->singleton(UserRepository::class, function ($app) {
            return new UserRepository(new User());
        });
        $this->app->singleton(FeedTypeRepository::class, function ($app) {
            return new FeedTypeRepository(new FeedType());
        });
        $this->app->singleton(FeedRepository::class, function ($app) {
            return new FeedRepository(new Feed(), $app->make(FeedTypeRepository::class));
        });
    }

    private function buildController()
    {
        $this->app->when(FeedController::class)
                  ->needs(BasePaginateRepository::class)
                  ->give(function ($app) {
                      return $app->make(FeedRepository::class);
                  });
    }
}
