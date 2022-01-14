<?php

namespace Public\Xunit;

use ReflectionMethod;

class WasRun extends TestCase
{
    public $was_run;

    public function __construct(string | int $was_run, $name)
    {
        $this->was_run = "NONE";
        parent::__construct($name);
    }

    public function run()
    {
        $method = $this->name;
        (new ReflectionMethod($this))->invoke($method);
    }

    public function testMethod()
    {
        $this->was_run = 1;
    }
}