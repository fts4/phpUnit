<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $resourceIntensiveQueue; // example, assuming I'm using a Queue Server.

    public function setUp(): void
    {
        static::$resourceIntensiveQueue->clear();
    }


    public static function setUpBeforeClass()
    {
        static::$resourceIntensiveQueue = new Queue;
    }


    public static function tearDownAfterClass()
    {
        static::$resourceIntensiveQueue = null;
    }


    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$resourceIntensiveQueue->getCount());
    }


    public function testAnItemIsAddedToTheQueue()
    {
        static::$resourceIntensiveQueue->push('green');
        $this->assertEquals(1, static::$resourceIntensiveQueue->getCount());
    }


    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$resourceIntensiveQueue->push('green');
        $item = static::$resourceIntensiveQueue->pop();
        $this->assertEquals(0, static::$resourceIntensiveQueue->getCount());
        $this->assertEquals('green', $item);
    }


    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$resourceIntensiveQueue->push('first');
        static::$resourceIntensiveQueue->push('second');
        $this->assertEquals('first', static::$resourceIntensiveQueue->pop());
    }
}
