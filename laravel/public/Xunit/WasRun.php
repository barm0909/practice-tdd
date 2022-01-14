<?php

namespace Public\Xunit;

require_once 'TestCase.php';

class WasRun extends TestCase
{
    public $was_run;
    public $name;

    public function __construct($name)
    {
        $this->was_run = "NONE";
        parent::__construct($name);
    }

    public function testMethod()
    {
        $this->was_run = 1;
    }
}