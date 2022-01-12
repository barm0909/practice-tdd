<?php

namespace Public\Xunit;

require_once 'WasRun.php';

$test = new WasRun("testMethod");
print($test->wasRun);
$test->testMethod();
print($test->wasRun);