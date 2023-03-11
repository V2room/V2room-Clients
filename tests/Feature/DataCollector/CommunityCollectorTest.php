<?php

namespace Tests\Feature\DataCollector;

use App\Services\DataCollector\Platform\Community\CollectorService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommunityCollectorTest extends TestCase
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
        $dataCollector = app()->make(\App\Services\DataCollector\Platform\Community\CollectorService::class);
        $dataCollector->call();
    }
}
