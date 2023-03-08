<?php

namespace App\Services\DataCollector\Contracts;

use PHPHtmlParser\Dom\HtmlNode;

interface SelectNodeContract
{
    public function select(HtmlNode $node): bool;
}