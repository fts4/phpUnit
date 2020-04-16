<?php


use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mailer = new Mailer();
        $mock = $this->createMock(Mailer::class);
        $mock->method('sendMessage')
            ->willReturn(true);
        $result = $mock->sendMessage('dev@email.com', 'Hello');
        $this->assertTrue($result);
    }


    public function testNotificationIsSent() {
        $user = new User;
        $user->email = 'dave@example.com';

        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('dave@example.com'), $this->equalTo('Hello'))
            ->willReturn(true);

        // use dependency injection to use the mock object of the Mailer class
        $user->setMailer($mockMailer);

        $this->assertTrue($user->notify('Hello'));
    }
}