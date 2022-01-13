<?php

namespace Public\Xunit;

class WasRun
{
    public $was_run;

    public function __construct(string | int $was_run)
    {
        $this->was_run = $was_run;
    }

    public function testMethod()
    {
        $this->was_run = 1;
    }
}