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
        $test->run(new TestResult());
        assert("setUp TestMethod tearDown " == $test->log);
    }

    public function testResult()
    {
        $test = new WasRun("TestMethod");
        $result = new TestResult();
        $test->run($result);
        assert("1 run, 0 failed" == $result->summary());
    }

    public function testFailedResult()
    {
        $test = new WasRun("testBrokenMethod");
        $result = new TestResult();
        $test->run($result);
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
        $result = new TestResult();
        $suite->run($result);
        assert("2 run, 1 failed" == $result->summary());
    }
}

$suite = new TestSuite();
$suite->add((new TestCaseTest("testTemplateMethod")));
$suite->add((new TestCaseTest("testResult")));
$suite->add((new TestCaseTest("testFailedResult")));
$suite->add((new TestCaseTest("testFailedResultFormatting")));
$suite->add((new TestCaseTest("testSuite")));
$result = new TestResult();
$suite->run($result);
print $result->summary();