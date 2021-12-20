<?php

namespace App\Money;

class Sum implements Expression
{
    private Money $augend;
    private Money $addend;

    public function __construct(Money $augend, Money $addend)
    {
        // $this->augend = $augend;
        // $this->addend = $addend;
    }
}