<?php

namespace Public\Xunit;

require_once 'TestCase.php';

class WasRun extends TestCase
{
    public $name;
    public $log;

    public function setUp()
    {
        $this->log = "setUp ";
    }

    public function testMethod()
    {
        $this->log = $this->log . "TestMethod ";
    }

    public function tearDown()
    {
        $this->log = $this->log . "tearDown ";
    }
}