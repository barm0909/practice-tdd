<?php

namespace Public\Xunit;

require_once 'WasRun.php';

$test = new WasRun("TestMethod");
echo $test->was_run . '<br/>';
$test->testMethod();
echo $test->was_run . PHP_EOL;