<?php

namespace Tests\Money;

use App\Money\Dollar;
use App\Money\Franc;
use App\Money\Money;
use phpDocumentor\Reflection\Types\This;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class MoneyTest extends TestCase
{
    /** @test */
    public function testMultiplication()
    {
        $money = Money::dollar(5);
        $this->assertEquals(Money::dollar(10), $money->times(2));
        $this->assertEquals(Money::dollar(15), $money->times(3));
    }

    /** @test */
    public function testEquality()
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertTrue((new Franc(5))->equals(new Franc(5)));
        $this->assertFalse((new Franc(5))->equals(new Franc(6)));
        $this->assertFalse((new Franc(5))->equals(Money::dollar(5)));
    }

    /** @test */
    public function testFrancMultiplication()
    {
        $franc = new Franc(5);
        $this->assertEquals(new Franc(10), $franc->times(2));
        $this->assertEquals(new Franc(15), $franc->times(3));
    }
}
