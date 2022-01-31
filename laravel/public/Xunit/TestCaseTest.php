<?php

namespace Public\Xunit;

require_once "TestCase.php";
require_once "WasRun.php";
require_once "TestResult.php";
require_once "TestSuite.php";

class TestCaseTest extends TestCase
{
    private $result;

    public function setUp()
    {
        $this->result = new TestResult();
    }

    public function testTemplateMethod()
    {
        $test = new WasRun("TestMethod");
        $test->run($this->result);
        assert("setUp TestMethod tearDown " == $test->log);
    }

    public function testResult()
    {
        $test = new WasRun("TestMethod");
        $test->run($this->result);
        assert("1 run, 0 failed" == $this->result->summary());
    }

    public function testFailedResult()
    {
        $test = new WasRun("testBrokenMethod");
        $test->run($this->result);
        assert("1 run, 1 failed" == $this->result->summary());
    }

    public function testFailedResultFormatting()
    {
        $this->result->testStarted();
        $this->result->testFailed();
        assert("1 run, 1 failed" == $this->result->summary());
    }

    public function testSuite()
    {
        $suite = new TestSuite();
        $suite->add(new WasRun("testMethod"));
        $suite->add(new WasRun("testBrokenMethod"));
        $suite->run($this->result);
        assert("2 run, 1 failed" == $this->result->summary());
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