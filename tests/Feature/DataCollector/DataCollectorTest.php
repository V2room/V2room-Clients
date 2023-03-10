<?php

namespace Tests\Feature\DataCollector;

use V2room\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataCollectorTest extends TestCase
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
        $dataCollector = app(\App\Services\DataCollector\DataCollectorService::class);
        $dataCollector->call();
    }
}
