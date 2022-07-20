<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\ReorderStudent;

class ReordeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function testReorderStudent()
    {
       

        $this->assertEmpty( \Artisan::call('reorder:student'));
    }
    
}
