<?php

namespace App\Money;

class Pair
{
    private string $from;
    private string $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function equals(object $object): bool
    {
        $pair = (new Pair($this->from, $this->to))->cast($object);
        return $this->from === $pair->from && $this->to === $pair->to;
    }

    public function hashCode(): int
    {
        return 0;
    }

    public function cast(object $object): self
    {
        return $object;
    }
}