<?php

namespace App\Providers;

use App\Http\Controllers\Feed\FeedController;
use App\Library\LaravelSupports\app\Database\Repositories\PaginateRepository;
use App\Models\Rooms\Room;
use App\Repositories\Feeds\FeedRepository;
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
            return new FeedRepository(new Room());
        });
    }

    private function buildController()
    {
        $this->app->when(FeedController::class)
                  ->needs(PaginateRepository::class)
                  ->give(function ($app) {
                      return $app->make(FeedRepository::class);
                  });
    }
}
