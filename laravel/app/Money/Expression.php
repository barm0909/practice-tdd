<?php

namespace App\Money;

interface Expression
{
    public function times(int $multiplier);
    public function plus(Expression $addend): Expression;
    public function reduce(Bank $bank, string $to): Money;
    public function expressionCast(object $object): self;
}