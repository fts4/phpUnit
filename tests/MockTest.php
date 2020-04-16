<?php


use PharIo\Manifest\Email;
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


    public function testCannotNotifyUserWithNoEmail()
    {
        $user = new User;

        // using getMockBuilder, instead of createMock, allows for full control
        // over the created mock objects. The original code in the methods of
        // the mock object would get run. For instance, exceptions would get
        // thrown in this example since EmailException is thrown if user email
        // is empty.
        // createMock can be used to achieve the same results here but with
        // createMock, ->will($this->throwException(EmailException)) will need
        // to get added when stubbing the sendMessage method, causing duplication
        // of efforts/code
        $mockMailer = $this->getMockBuilder(Mailer::class)
            ->setMethods(null)
            ->getMock();

        $user->setMailer($mockMailer);

        $this->expectException(EmailException::class);

        $user->notify('Hello');
    }
}