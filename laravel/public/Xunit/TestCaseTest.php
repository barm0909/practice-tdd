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

    public function testTemplateMethod()
    {
        $this->test->run();
        assert("setUp TestMethod " == $this->test->log);
    }
}

(new TestCaseTest("testTemplateMethod"))->run();