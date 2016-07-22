<?php

namespace tests;

use Drips\Mail\Mail;
use PHPUnit_Framework_TestCase;

class MailTest extends PHPUnit_Framework_TestCase
{
    public function testMail()
    {
        $mail = new Mail;
        $mail->setFrom('noreply@prowect.com', 'Mailer');
        $mail->addAddress('test@prowect.com', 'Test');

        $mail->Subject = 'Here is the subject';
        $mail->Body = 'This is the body in plain text for non-HTML mail clients';

        $this->assertTrue($mail->send());
    }
}
