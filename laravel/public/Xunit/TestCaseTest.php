<?php

namespace Public\Xunit;

require_once "TestCase.php";
require_once "WasRun.php";
require_once "TestResult.php";

class TestCaseTest extends TestCase
{
    public function testTemplateMethod()
    {
        $test = new WasRun("TestMethod");
        $test->run();
        assert("setUp TestMethod tearDown " == $test->log);
    }

    public function testResult()
    {
        $test = new WasRun("TestMethod");
        $result = $test->run();
        assert("1 run, 0 failed" == $result->summary());
    }

    public function testFailedResult()
    {
        $test = new WasRun("testBrokenMethod");
        $result = $test->run();
        assert("1 run, 1 failed" == $result->summary());
    }

    public function testFailedResultFormatting()
    {
        $result = new TestResult();
        $result->testStarted();
        $result->testFailed();
        assert("1 run, 1 failed" == $result->summary());
    }
}

(new TestCaseTest("testTemplateMethod"))->run();
(new TestCaseTest("testResult"))->run();
// (new TestCaseTest("testFailedResult"))->run();
(new TestCaseTest("testFailedResultFormatting"))->run();