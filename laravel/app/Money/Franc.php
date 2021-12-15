<?php

namespace App\Money;

class Franc extends Money
{
    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times(int $multiplier): Money
    {
        return new Franc($this->amount * $multiplier, $this->currency);
    }
}