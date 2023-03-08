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

    protected function getListItemSelector(): string
    {
        return '.li_best2_pop0 h3[class="title"] a';
    }


    protected function getCategoryParamName(): string
    {
        return 'mid';
    }
}