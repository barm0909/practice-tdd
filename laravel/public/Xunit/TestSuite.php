<?php

namespace Public\Xunit;

class TestSuite
{
    public $tests = [];

    public function add($test)
    {
        $this->tests[] = $test;
    }

    public function run($result)
    {
        foreach ($this->tests as $test) {
            $test->run($result);
        }
    }
}