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
        return $this->amount === $money->amount && get_class($this) === get_class($money);
    }

    public static function dollar(int $amount): Dollar
    {
        return new Dollar($amount);
    }
}