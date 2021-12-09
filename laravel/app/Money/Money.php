<?php

namespace App\Money;

class Money
{
    protected $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function equals(Money $money): bool
    {
        return $this->amount === $money->amount;
    }
}