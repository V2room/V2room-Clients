<?php

namespace Tests\Feature\DataCollector;

use App\Services\DataCollector\Platform\News\CollectorService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsCollectorTest extends TestCase
{
    use RefreshDatabase;
//    use TransactionTrait;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_call()
    {
        $dataCollector = app()->make(CollectorService::class);
        $dataCollector->call();
    }
}
