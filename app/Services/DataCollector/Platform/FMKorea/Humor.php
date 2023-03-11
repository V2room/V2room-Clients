<?php

namespace App\Services\DataCollector\Platform\FMKorea;

class Humor extends FMKorea
{
    protected function getListUri(): string
    {
        return '/index.php?mid=humor&order_type=desc&category=1899663';
    }

    protected function getCategory(): string
    {
        return 'humor';
    }
    protected function getTitleSelector(): string
    {
        return '.title a';
        // return 'td[class="title hotdeal_var8"] a';
    }
}