<?php

namespace App\Providers;

use App\Http\Controllers\Feed\FeedController;
use App\Models\Rooms\Room;
use App\Repositories\BasePaginateRepository;
use App\Repositories\Feeds\FeedRepository;
use App\Services\Auth\AuthService;
use Illuminate\Support\ServiceProvider;

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
        $this->app->singleton(FeedRepository::class, function ($app) {
            return new FeedRepository(new Room(), $app->make(AuthService::class));
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
