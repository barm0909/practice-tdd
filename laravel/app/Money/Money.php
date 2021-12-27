<?php

namespace App\Money;

class Money implements Expression
{
    protected $amount;
    protected $currency;
    
    public function __construct(int $ammout, string $currency)
    {
        $this->amount = $ammout;
        $this->currency = $currency;
    }

    public function times(int $multiplier): Expression
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Expression $addend): Expression
    {
        return new Sum($this, $addend);
    }

    public function reduce(Bank $bank, string $to): Money
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount /$rate, $to);
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
        return new Money($amount, "USD");
    }

    public static function franc(int $amount): Money
    {
        return new Money($amount, "CHF");
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function cast(object $object): self
    {
        return $object;
    }

    public function expressionCast(object $object): Expression
    {
        return $object;
    }
}