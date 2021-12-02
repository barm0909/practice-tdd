<?php

namespace App\Money;

class Dollar
{
    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = 10;
    }

    public function times(int $multiplier)
    {

    }
}