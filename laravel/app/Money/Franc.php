<?php

namespace App\Money;

class Franc extends Money
{
    public function times(int $multiplier)
    {
        return new Franc($this->amount * $multiplier);
    }
}