<?php

namespace App\Services\DataCollector\Platform\FMKorea;

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
        return '.li_best2_pop0';
    }

    protected function getTitleSelector(): string
    {
        return '.title a';
        // return 'h3[class="title"] a';
    }

    protected function getCategorySelector(): string
    {
        return 'span[class="category"] a';
    }

    protected function getWriterSelector(): string
    {
        return 'span[class="author"]';
    }

    protected function getDetailSelector(): string
    {
        // TODO: Implement getDetailSelector() method.
        return 'a[class=" hotdeal_var8"]';
    }

    protected function getCategoryParamName(): string
    {
        return 'mid';
    }

    protected function getCategory(): string
    {
        return '';
    }

    protected function getType(): string
    {
        return 'fm_korea';
    }

}