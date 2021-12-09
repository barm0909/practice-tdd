<?php

namespace App\Money;

class Dollar extends Money
{
    public function times(int $multiplier)
    {
        return new Dollar($this->amount * $multiplier);
    }
}