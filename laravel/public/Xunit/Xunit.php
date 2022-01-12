<?php

namespace Public\Xunit;

require_once 'WasRun.php';

$test = new WasRun(NULL);
print($test->was_run);
$test->testMethod();
print($test->was_run);