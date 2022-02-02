<?php

namespace Public\Xunit;

require_once "WasRun.php";
require_once "TestResult.php";

class TemplateMethodTest
{
    public function testTemplateMethod()
    {
        $test = new WasRun("testMethod");
        $result = new TestResult();
        $test->run($result);
        assert("setUp TestMethod tearDown " == $test->log);
    }
}