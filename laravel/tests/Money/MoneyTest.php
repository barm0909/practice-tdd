<?php

namespace Tests\Money;

use App\Money\Bank;
use App\Money\Dollar;
use App\Money\Expression;
use App\Money\Franc;
use App\Money\Money;
use App\Money\Sum;
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

    /** @test */
    public function testPlusRetrunSum()
    {
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $sum = $result;
        $this->assertEquals($five, $sum->augend);
        $this->assertEquals($five, $sum->addend);
    }

    /** @test */
    public function testReduceSum()
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(7), $result);
    }

    /** @test */
    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), "USD");
        $this->assertEquals(Money::dollar(1), $result);
    }

    /** @test */
    public function testReduceMoneyDifferenceCurrency()
    {
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce(Money::franc(2), "USD");
        $this->assertEquals(Money::dollar(1), $result);
    }

    /** @test */
    public function testIdentityRate()
    {
        $this->assertEquals(1, (new Bank())->rate("USD", "USD"));
    }

    /** @test */
    public function testMixedAddition()
    {
        $five_bucks = Money::dollar(5);
        $five_bucks = $five_bucks->expressionCast($five_bucks);
        $ten_francs = Money::franc(10);
        $ten_francs = $ten_francs->expressionCast($ten_francs);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $result = $bank->reduce($five_bucks->plus($ten_francs), "USD");
        $this->assertEquals(Money::dollar(10), $result);
    }

    /** @test */
    public function testSumPlusMoney()
    {
        $five_bucks = Money::dollar(5);
        $five_bucks = $five_bucks->expressionCast($five_bucks);
        $ten_francs = Money::franc(10);
        $ten_francs = $ten_francs->expressionCast($ten_francs);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $sum = (new Sum($five_bucks, $ten_francs))->plus($five_bucks);
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(15), $result);
    }

    /** @test */
    public function testSumTimes()
    {
        $five_bucks = Money::dollar(5);
        $five_bucks = $five_bucks->expressionCast($five_bucks);
        $ten_francs = Money::franc(10);
        $ten_francs = $ten_francs->expressionCast($ten_francs);
        $bank = new Bank();
        $bank->addRate("CHF", "USD", 2);
        $sum = (new Sum($five_bucks, $ten_francs))->times(2);
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(20), $result);
    }
}
