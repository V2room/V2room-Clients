<?php

namespace App\Services\DataCollector\Contracts;

use PHPHtmlParser\Dom\HtmlNode;

interface SelectNodeContract
{
    public function select(string $title, string $uri): bool;
}