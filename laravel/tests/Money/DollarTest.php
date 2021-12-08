<?php

namespace Tests\Money;

use App\Money\Dollar;
use Tests\TestCase;

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
}
