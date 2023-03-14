<?php

namespace App\Services\DataCollector\Platform\News;

use PHPHtmlParser\Dom;

class BigKinds extends HttpCaller
{

    protected function moveToDetail($url): Dom\HtmlNode|null
    {
        return null;
    }

    protected function getBaseUri(): string
    {
        return 'https://www.bigkinds.or.kr';
    }

    protected function getListUri(): string
    {
        return '/v2/news/recentNews.do';
    }

    protected function getDetailUri(string $id): string
    {
        return '';
    }

    protected function getCategoryParamName(): string
    {
        // TODO: Implement getCategoryParamName() method.
        return '';
    }

    protected function getCategory(): string
    {
        // TODO: Implement getCategory() method.
        return '';
    }

    protected function getListItemSelector(): string
    {
        return '.news-item';
    }

    protected function getTitleSelector(): string
    {
        // TODO: Implement getTitleSelector() method.
        return '';
    }

    protected function getCategorySelector(): string
    {
        // TODO: Implement getCategorySelector() method.
        return '';
    }

    protected function getWriterSelector(): string
    {
        // TODO: Implement getWriterSelector() method.
        return '';
    }

    protected function getDetailSelector(): string
    {
        // TODO: Implement getDetailSelector() method.
        return '';
    }

    protected function getContentSelector(): string
    {
        // TODO: Implement getContentSelector() method.
        return '';
    }

    protected function getType(): string
    {
        // TODO: Implement getType() method.
        return '';
    }

}