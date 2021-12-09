<?php

namespace App\Money;

class Money
{
    protected $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }
}