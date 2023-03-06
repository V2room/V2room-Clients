<?php

namespace App\Services\DataCollector\Platform;

use App\Services\DataCollector\Http\Caller;

class FMKorea extends Caller
{

    protected function getBaseUri(): string
    {
        return 'https://www.fmkorea.com';
    }

    protected function getListUri(): string
    {
        return '/';
    }

    protected function getDetailUri(string $id): string
    {
        return '/' . $id;
    }
}