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
}