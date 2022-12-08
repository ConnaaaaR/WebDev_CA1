<?php

namespace Tests\Unit;

use App\Models\Role;
use PHPUnit\Framework\TestCase;

class roleTest extends TestCase
{
    public function test_Class_Constructor()
    {
        $role = new Role();
        $role->name = 'user';
        $role->description = 'A User';

        $this->assertSame('user', $role->name);
        $this->assertSame('A User', $role->description);
    }
}
