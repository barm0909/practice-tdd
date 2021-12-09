<?php

namespace Tests\Money;

use App\Money\Dollar;
use App\Money\Franc;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class MoneyTest extends TestCase
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
        $this->assertTrue((new Franc(5))->equals(new Franc(5)));
        $this->assertFalse((new Franc(5))->equals(new Franc(6)));
    }

    /** @test */
    public function testFrancMultiplication()
    {
        $franc = new Franc(5);
        $this->assertEquals(new Franc(10), $franc->times(2));
        $this->assertEquals(new Franc(15), $franc->times(3));
    }
}
