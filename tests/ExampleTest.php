<?php
namespace App\tests;
use \PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoResultsInFour()
    {
        $this->assertEquals(4,(2 + 2));
    }

    public function testCanUseMultipleAssertions()
    {
        $this->assertEquals(true, true);
        $this->assertTrue(true);
    }
}



