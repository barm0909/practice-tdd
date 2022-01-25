<?php

namespace Public\Xunit;

class TestResult
{
    public $run_count;
    public $error_count;

    public function __construct()
    {
        $this->run_count = 0;
        $this->error_count = 0;
    }

    public function testStarted()
    {
        $this->run_count = $this->run_count + 1;
    }

    public function testFailed()
    {
        $this->error_count = $this->error_count + 1;
    }

    public function summary()
    {
        return "$this->run_count run, $this->error_count failed";
    }
}