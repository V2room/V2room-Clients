<?php

namespace Tests\Feature\Users;

use App\Models\Users\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelSupports\Libraries\Supports\Databases\Traits\TransactionTrait;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

//    use TransactionTrait;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_user_create()
    {
        $count = 100;
        $users = User::factory()->count($count)->create();
        $this->assertEquals($count, $users->count());
    }
}
