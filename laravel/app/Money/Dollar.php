<?php

namespace App\Money;

class Dollar extends Money
{
    public function __construct()
    {
        parent::__construct($amount, $);
    }

    public function times(int $multiplier): Money
    {
        return new Dollar($this->amount * $multiplier, $this->currency);
    }
}