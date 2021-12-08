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
        $this->assertEquals(10, $product->amount);
        $product = $dollar->times(3);
        $this->assertEquals(15, $product->amount);
    }

    /** @test */
    public function testEquality()
    {
        assertTrue((new Dollar(5))->equals(new Dollar(5)));
    }
}
