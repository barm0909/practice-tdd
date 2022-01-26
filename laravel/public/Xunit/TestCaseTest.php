<?php

namespace Public\Xunit;

require_once "TestCase.php";
require_once "WasRun.php";
require_once "TestResult.php";
require_once "TestSuite.php";

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

    public function testSuite()
    {
        $suite = new TestSuite();
        $suite->add(new WasRun("testMethod"));
        $suite->add(new WasRun("testBrokenMethod"));
        $result = $suite->run();
    }
}

print (new TestCaseTest("testTemplateMethod"))->run()->summary();
print (new TestCaseTest("testResult"))->run()->summary();
print (new TestCaseTest("testFailedResult"))->run()->summary();
print (new TestCaseTest("testFailedResultFormatting"))->run()->summary();
print (new TestCaseTest("testSuite"))->run()->summary();