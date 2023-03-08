<?php

namespace App\Services\DataCollector;

use App\Services\DataCollector\Contracts\SelectNodeContract;
use PHPHtmlParser\Dom\HtmlNode;

class SelectNodeCallback implements SelectNodeContract
{

    public function select(HtmlNode $node): bool
    {
        dd($node);
    }
}