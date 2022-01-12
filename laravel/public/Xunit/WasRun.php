<?php

namespace Public\Xunit;

class WasRun
{
    public $was_run;

    public function __construct(bool $was_run)
    {
        $this->was_run = false;
    }
}