<?php

namespace App\Services\DataCollector;

class DataCollector
{
    /**
     * @param array<\App\Services\DataCollector\Http\Caller> $platforms
     * @author  WilsonParker
     * @added   2023/03/06
     * @updated 2023/03/06
     */
    public function __construct(protected array $platforms) {}

    public function call(): void
    {
        foreach ($this->platforms as $platform) {
            $platform->call();
        }
    }

}