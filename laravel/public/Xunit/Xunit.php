<?php

namespace App\Xunit;

$test = new WasRun("testMethod");
print($test->wasRun);
$test->testMethod();
print($test->wasRun);