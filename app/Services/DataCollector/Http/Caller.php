<?php

namespace App\Services\DataCollector\Http;

use GuzzleHttp\Client;
use JetBrains\PhpStorm\NoReturn;
use PHPHtmlParser\Dom;

abstract class Caller
{
    protected Client $client;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->getBaseUri(),
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
    }

    #[NoReturn]
    public function call(): void
    {
        $response = $this->client->get($this->getListUri());
        $dom = new Dom();
        $dom->loadStr($response->getBody()->getContents());
        $tags = $dom->find($this->getListItemSelector());
        foreach ($tags as $tag) {
            dump($tag->getAttribute('href'));
            dump($tag->text);
        }
        exit;
    }

    abstract protected function getBaseUri(): string;

    abstract protected function getListUri(): string;

    abstract protected function getDetailUri(string $id): string;

    abstract protected function getListItemSelector();
}