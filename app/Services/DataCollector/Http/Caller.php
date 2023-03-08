<?php

namespace App\Services\DataCollector\Http;

use GuzzleHttp\Client;
use JetBrains\PhpStorm\NoReturn;
use PHPHtmlParser\Dom;

abstract class Caller
{
    protected Client $client;
    protected int $page = 1;

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->getBaseUri(),
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
    }

    /**
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     * @author  WilsonParker
     * @added   2023/03/08
     * @updated 2023/03/08
     */
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

    /**
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\CircularException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     * @throws \PHPHtmlParser\Exceptions\StrictException
     * @author  WilsonParker
     * @added   2023/03/08
     * @updated 2023/03/08
     */
    #[NoReturn]
    public function continue(): void
    {
        $this->addPage();
        $this->call();
    }

    abstract protected function getBaseUri(): string;

    abstract protected function getListUri(): string;

    abstract protected function getDetailUri(string $id): string;

    abstract protected function getPageParamName(): string;

    abstract protected function getCategoryParamName(): string;

    abstract protected function getListItemSelector();

    public function addPage(): void
    {
        $this->setPage($this->page + 1);
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }
}