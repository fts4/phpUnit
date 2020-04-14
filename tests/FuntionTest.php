<?php

use PHPUnit\Framework\TestCase;
include __DIR__ . "/../functions.php";

class FunctionTest extends TestCase
{
    public function testAddReturnsTheCorrectSum()
    {
//        var_dump((__DIR__ . "/../functions.php"));

        $this->assertEquals(4, add(2,2));
        $this->assertEquals(8, add(3,5));
    }

    public function testAddDoesNotReturnTheIncorrectSum()
    {
//        include __DIR__ . "/../functions.php";
        $this->assertNotEquals(5, add(2,2));
    }
}