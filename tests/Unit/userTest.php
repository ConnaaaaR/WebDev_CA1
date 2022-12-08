<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_Class_Constructor()
    {
        $user = new User();
        $user->name = 'Connor Mattless';
        $user->email = 'cm@gmail.com';
        $user->password = Hash::make('password');
        $user->company_id = 1;


        $this->assertSame('Connor Mattless', $user->name);
        $this->assertSame('cm@gmail.com', $user->email);
        $this->assertSame(1, $user->company_id);
    }
}
