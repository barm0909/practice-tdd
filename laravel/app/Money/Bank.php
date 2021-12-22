<?php

namespace App\Money;

class Bank
{
    public function reduce(Expression $source, string $to): Money
    {
        if($source instanceof Money) {
            return (new Money(1,1))->cast($source);
        }
        $sum = (new Sum($source->augend, $source->addend))->cast($source);
        return $sum->reduce($to);
    }
}