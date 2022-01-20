<?php

namespace Public\Xunit;

class TestCase
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setUp()
    {
        return null;
    }

    public  function tearDown()
    {
        return null;
    }

    public function run()
    {
        $this->setUp();
        call_user_func([$this, $this->name]);
        $this->tearDown();
    }
}