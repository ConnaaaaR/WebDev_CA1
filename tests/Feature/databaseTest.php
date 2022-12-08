<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class databaseTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_user_table()
    {
        $this->seed();
        $users = User::all();

        $this->assertNotEmpty($users);
    }
}
