<?php

namespace Public\Xunit;

require_once "TestCase.php";
require_once "WasRun.php";

class TestCaseTest extends TestCase
{
    public function setUp()
    {
        $this->test = new WasRun("TestMethod");
    }

    public function testRunning()
    {
        $this->test->run();
        assert($this->test->was_run);
    }

    public function testSetUp()
    {
        $this->test->run();
        assert("setUp TestMethod " == $this->test->log);
    }
}

(new TestCaseTest("testRunning"))->run();
(new TestCaseTest("testSetUP"))->run();