<?php

use \PHPUnit\Framework\TestCase;
//require __DIR__ . '/../vendor/autoload.php';

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        // require 'User.php';
        $user = new User;
        $user->first_name = "Teresa";
        $user->sur_name = "Green";

        $this->assertEquals("Teresa Green", $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User;
        $this->assertEquals("", $user->getFullName());
    }

    public function testUserHasFirstName()
    {
        $user = new User;
        $user->first_name = 'Teresa';
        $this->assertEquals('Teresa', $user->first_name);
    }

    /**
     * @test
     */
    public function user_has_sur_name()
    {
        $user = new User;
        $user->sur_name = 'Green';
        $this->assertEquals('Green', $user->sur_name);
    }


}