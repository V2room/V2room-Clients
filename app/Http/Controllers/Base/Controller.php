<?php

namespace App\Http\Controllers\Base;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class Controller extends \LaravelSupports\Controllers\BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
