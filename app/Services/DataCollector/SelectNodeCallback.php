<?php

namespace App\Services\DataCollector;

use App\Services\DataCollector\Contracts\SelectNodeContract;
use PHPHtmlParser\Dom\HtmlNode;

class SelectNodeCallback implements SelectNodeContract
{

    public function select(string $title, string $category, string $writer, string $uri): bool
    {
        dump($title, $category, $writer, $uri);
        return true;
    }
}