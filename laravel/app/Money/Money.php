<?php

namespace App\Money;

class Money
{
    protected $amount;
    protected $currency;
    
    public function __construct(int $ammout, string $currency)
    {
        $this->amount = $ammout;
        $this->currency = $currency;
    }

    function times(int $multiplier): Money
    {
        return null;
    }
    
    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount && $this->currency === $money->currency;
    }

    public function __toString()
    {
        return $this->amount . " " . $this->currency;
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