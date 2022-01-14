<?php

namespace Public\Xunit;

use ReflectionMethod;

class TestCase
{
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function run()
    {
        $method = $this->name;
        (new ReflectionMethod($this))->invoke($method);
    }
}