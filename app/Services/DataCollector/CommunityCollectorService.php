<?php

namespace App\Services\DataCollector;

class CommunityCollectorService
{
    /**
     * @param array<\App\Services\DataCollector\Http\Caller> $platforms
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