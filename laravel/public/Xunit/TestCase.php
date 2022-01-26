<?php

namespace Public\Xunit;

require_once "TestResult.php";

class TestCase
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setUp()
    {
        return null;
    }

    public  function tearDown()
    {
        return null;
    }

    public function run()
    {
        $result = new TestResult();
        $result->testStarted();
        $this->setUp();
        try {
            call_user_func([$this, $this->name]);
        } catch (\Throwable $th) {
            $result->testFailed();
        }
        $this->tearDown();
        return $result;
    }
}