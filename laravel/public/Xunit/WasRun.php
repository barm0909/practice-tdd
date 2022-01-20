<?php

namespace Public\Xunit;

require_once 'TestCase.php';

class WasRun extends TestCase
{
    public $was_run;
    public $name;
    public $log;

    public function setUp()
    {
        $this->was_run = "NONE";
        $this->wasSetUp = 1;
        $this->log = "setUp";
    }

    public function testMethod()
    {
        $this->was_run = 1;
    }
}