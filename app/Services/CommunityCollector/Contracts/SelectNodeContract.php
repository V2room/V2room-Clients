<?php

namespace App\Services\CommunityCollector\Contracts;

use PHPHtmlParser\Dom\HtmlNode;

interface SelectNodeContract
{
    public function select(string $title, string $category, string $writer, string $uri): bool;
}