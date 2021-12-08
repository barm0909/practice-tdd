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
        $product =  $dollar->times(2);
        $this->assertEquals(new Dollar(10), $product);
        $product = $dollar->times(3);
        $this->assertEquals(new Dollar(15), $product);
    }

    /** @test */
    public function testEquality()
    {
        $this->assertTrue((new Dollar(5))->equals(new Dollar(5)));
        $this->assertFalse((new Dollar(5))->equals(new Dollar(6)));
    }
}
