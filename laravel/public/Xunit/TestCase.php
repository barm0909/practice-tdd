<?php

namespace Public\Xunit;

use ReflectionMethod;

class TestCase
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function run()
    {
        call_user_func([$this, $this->name]);
    }
}