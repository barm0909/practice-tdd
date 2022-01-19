<?php

namespace Public\Xunit;

require_once "TestCase.php";
require_once "WasRun.php";

class TestCaseTest extends TestCase
{
    public function testRunning()
    {
        $test = new WasRun("TestMethod");
        assert(!$test->was_run);
        $test->run();
        assert($test->was_run);
    }

    public function testSetUp()
    {
        $test = new WasRun("TestMethod");
        $test->run();
        assert($test->wasSetUp);
    }
}

(new TestCaseTest("testRunning"))->run();
(new TestCaseTest("testSetUP"))->run();