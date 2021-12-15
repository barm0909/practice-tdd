<?php

namespace App\Money;

use Illuminate\Validation\Rules\In;

abstract class Money
{
    protected $amount;
    protected $currency;
    abstract function times(int $multiplier): Money;

    protected function __construct(int $ammout, string $currency)
    {
        $this->amount = $ammout;
        $this->currency = $currency;
    }

    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount && get_class($this) === get_class($money);
    }

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount, "USD");
    }

    public static function franc(int $amount): Money
    {
        return new Franc($amount, "CHF");
    }

    public function currency(): string
    {
        return $this->currency;
    }
}