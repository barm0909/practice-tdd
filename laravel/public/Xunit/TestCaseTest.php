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
}

(new TestCaseTest("testTemplateMethod"))->run();