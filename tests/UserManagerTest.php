<?php

use PHPUnit\Framework\TestCase;
use App\User;
use App\Mailer;
use App\UserManager;

class UserManagerTest extends TestCase {
    public function testNotify() {
        $user = new User("user@example.com");
        
        $mailerMock = $this->getMockBuilder(Mailer::class)
                           ->onlyMethods(['sendEmail'])
                           ->getMock();
        
        $mailerMock->expects($this->once())
                   ->method('sendEmail')
                   ->with($this->equalTo("user@example.com"));
        
        $userManager = new UserManager($mailerMock);
        $userManager->notify($user);
    }
}
