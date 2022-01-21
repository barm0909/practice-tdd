<?php

namespace Public\Xunit;

require_once "TestCase.php";
require_once "WasRun.php";

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
        assert("1 runm, 0 failed" == $result->summary);
    }
}

(new TestCaseTest("testTemplateMethod"))->run();
(new TestCaseTest("testResult"))->run();