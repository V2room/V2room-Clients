<?php

namespace App\Services\DataCollector\Platform\News;

class CollectorService
{
    /**
     * @param \App\Services\DataCollector\Platform\News\Caller[] $platforms
     * @author  WilsonParker
     * @added   2023/03/06
     * @updated 2023/03/06
     */
    public function __construct(protected array $platforms) {}

    /**
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     */
    public function call(): void
    {
        foreach ($this->platforms as $platform) {
            $platform->call();
        }
    }

}