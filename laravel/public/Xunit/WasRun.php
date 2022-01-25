<?php

namespace Public\Xunit;

use Exception;

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

    public function testBrokenMethod()
    {
        throw new Exception();
    }

    public function tearDown()
    {
        $this->log = $this->log . "tearDown ";
    }
}