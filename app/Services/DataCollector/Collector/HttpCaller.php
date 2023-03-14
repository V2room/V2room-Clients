<?php

namespace App\Services\DataCollector\Collector;

use App\Services\DataCollector\Contracts\SelectNodeContract;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use JetBrains\PhpStorm\NoReturn;
use PHPHtmlParser\Dom;

abstract class HttpCaller
{
    protected Client $client;
    protected int $page = 1;

    protected string $regTitle = '^(&nbsp)^';
    protected string $regCategory = '^(&nbsp)^';
    protected string $regWriter = '^(&nbsp)^';
    protected string $regDetail = '^(&nbsp)^';

    public function __construct(protected SelectNodeContract $callback)
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
        $tags = $this->moveToList();
        dd($tags);
        $continue = true;
        foreach ($tags as $tag) {
            $detailTag = $this->moveToDetail($this->extractDetailUri($tag));
            dd($detailTag);
            $continue = $this->callback->select($this->extractTitle($tag), $this->extractCategory($tag), $this->extractWriter($tag), $this->extractDetailUri($tag), $this->extractContent($detailTag));
            if (!$continue) {
                break;
            }
        }
        if ($continue) {
            $this->continue();
        }
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

    protected function moveToList(): Dom\Collection|null
    {
        $response = $this->client->get($this->buildListUri());
        $dom = new Dom();
        $dom->loadStr($response->getBody()->getContents());
        return $dom->find($this->getListItemSelector());
    }

    protected function moveToDetail($url): Dom\HtmlNode|null
    {
        $response = $this->client->get($url);
        $dom = new Dom();
        $dom->loadStr($response->getBody()->getContents());
        return $dom->find($this->getContentSelector())[0];
    }

    protected function buildListUri(): string
    {
        $params = [];
        $baseUri = parse_url($this->getListUri())['path'];
        parse_str(parse_url($this->getListUri(), PHP_URL_QUERY), $params);
        $params[$this->getPageParamName()] = $this->page;
        return $baseUri . "?" . http_build_query($params);
    }

    protected function getPageParamName(): string
    {
        return 'page';
    }

    protected function extractTitle(Dom\HtmlNode $node): string
    {
        $node = $node->find($this->getTitleSelector());
        return $this->replaceString($this->regTitle, '', $node->text());
    }

    protected function extractCategory(Dom\HtmlNode $node): string
    {
        $node = $node->find($this->getCategorySelector());
        return $this->replaceString($this->regCategory, '', $node->text());
    }

    protected function extractWriter(Dom\HtmlNode $node): string
    {
        $node = $node->find($this->getWriterSelector());
        return $this->replaceString($this->regWriter, '', $node->text());
    }

    protected function extractDetailUri(Dom\HtmlNode $node): string
    {
        $node = $node->find($this->getDetailSelector());
        return $this->replaceString($this->regDetail, '', $node->getAttribute('href'));
    }

    protected function extractContent(Dom\HtmlNode $node): string
    {
        $node = $node->find($this->getContentSelector());
        return $this->replaceString($this->regDetail, '', $node->text());
    }

    protected function replaceString(string $regex, string $replacement, string $subject): string
    {
        return Str::squish(preg_replace($regex, $replacement, $subject));
    }

    public function addPage(): void
    {
        $this->setPage($this->page + 1);
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    abstract protected function getBaseUri(): string;

    abstract protected function getListUri(): string;

    abstract protected function getDetailUri(string $id): string;

    abstract protected function getCategoryParamName(): string;

    abstract protected function getCategory(): string;

    abstract protected function getListItemSelector(): string;

    abstract protected function getTitleSelector(): string;

    abstract protected function getCategorySelector(): string;

    abstract protected function getWriterSelector(): string;

    abstract protected function getDetailSelector(): string;
    abstract protected function getContentSelector(): string;

    abstract protected function getType(): string;

}