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
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    /** @test */
    public function testCurrency()
    {
        $this->assertEquals('USD', (Money::dollar(1))->currency());
        $this->assertEquals('CHF', (Money::franc(1))->currency());
    }

    /** @test */
    public function testSimpleAddition()
    {
        $five = Money::dollar(5);
        $sum = $five->plus(Money::dollar(5));
        $bank = new Bank();
        $reduced = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(10), $reduced);
    }
}
