<?php

namespace Public\Xunit;

class TestResult
{
    public $run_count;

    public function __construct()
    {
        $this->run_count = 0;
    }

    public function testStarted()
    {
        $this->run_count = $this->run_count + 1;
    }

    public function summary()
    {
        return "$this->run_count run, 0 failed";
    }
}