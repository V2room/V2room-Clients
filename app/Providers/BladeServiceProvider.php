<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('isblank', function ($expression) {
            return $expression == '';
        });

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('Y:m:d H:i:s'); ?>";
        });
    }
}
