<?php

namespace Public\Xunit;

require_once "TestCase.php";

class TestCaseTest extends TestCase
{
    public function testRunning()
    {
        $test = new WasRun("TestMethod");
        assert(!$test->was_run);
        $test->run();
        assert($test->was_run);
    }
}

(new TestCaseTest("testRunning"))->run();