<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\App;

class Controller extends \LaravelSupports\Controllers\BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function init()
    {
        $locale = request('locale', config('app.locale'));
        App::setLocale($locale);
        $this->before();
    }

    protected function before() {}

}
