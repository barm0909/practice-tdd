<?php

namespace App\Money;

class Dollar extends Money
{
    public function times(int $multiplier): Money
    {
        return new Dollar($this->amount * $multiplier);
    }

    public function currency(): string
    {
        return "USD";
    }
}