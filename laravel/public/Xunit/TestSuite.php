<?php

namespace Public\Xunit;

class TestSuite
{
    public $tests = [];

    public function __construct()
    {
        $this->tests = [];
    }

    public function add($tests)
    {
        foreach ($tests as $test) {
            array_push($this->tests, $test);
        }
    }

    public function run()
    {
        $result = new TestResult();
        foreach ($this->tests as $test) {
            $test->run($result);
        }
        return $result;
    }
}