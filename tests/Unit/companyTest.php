<?php

namespace Tests\Unit;

use App\Models\Company;
use PHPUnit\Framework\TestCase;

class companyTest extends TestCase
{
    public function test_Class_Constructor()
    {
        $company = new Company();
        $company->name = 'Test Company';
        $company->address = 'Test Address';


        $this->assertSame('Test Company', $company->name);
        $this->assertSame('Test Address', $company->address);
    }
}
