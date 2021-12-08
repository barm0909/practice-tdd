<?php

namespace Tests\Money;

use App\Money\Dollar;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class DollarTest extends TestCase
{
    /** @test */
    public function testMultiplication()
    {
        $dollar = new Dollar(5);
        $this->assertEquals(new Dollar(10), $dollar->times(2));
        $this->assertEquals(new Dollar(15), $dollar->times(3));
    }

    /** @test */
    public function testEquality()
    {
        $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
        $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
    }
}
