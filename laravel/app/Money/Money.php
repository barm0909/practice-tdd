<?php

namespace App\Money;

abstract class Money
{
    protected $amount;
    abstract function times(int $multiplier): Money;

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