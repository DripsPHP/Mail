# Mail

[![Build Status](https://travis-ci.org/Prowect/Mail.svg)](https://travis-ci.org/Prowect/Mail)
[![Code Climate](https://codeclimate.com/github/Prowect/Mail/badges/gpa.svg)](https://codeclimate.com/github/Prowect/Mail)
[![Test Coverage](https://codeclimate.com/github/Prowect/Mail/badges/coverage.svg)](https://codeclimate.com/github/Prowect/Mail/coverage)
[![Latest Release](https://img.shields.io/packagist/v/drips/Mail.svg)](https://packagist.org/packages/drips/mail)

## Beschreibung

Mailer basierend auf [PHPMailer](https://github.com/PHPMailer/PHPMailer).

## Konfiguration

+ `mail_smtp` - legt fest ob ein SMTP Server verwendet werden soll (true/false)
+ `mail_smtp_host` - SMTP Host angeben
+ `mail_smtp_auth`- legt fest ob Authentifizierung erforderlich ist (true/false)
+ `mail_smtp_username` - Benutzername
+ `mail_smtp_password` - Passwort
+ `mail_smtp_secure`- Verschlüsselung
+ `mail_smtp_port` - Port

+ `mail_from_email` - (optional) Emailadresse von der die Emails standardmäßig abgesendet werden sollen
+ `mail_from_name` - (optional) Absendername, der angezeigt wird
+ `mail_cc` - (optional) Kopie der Email an mehrere Empfänger
+ `mail_bcc` - (optional) Blindkopie der Email

## Beispiel

```php
<?php

use Drips\Mail\Mail;

$mail = new Mail;

$mail->addAddress('test@prowect.com', 'Test'); // Empfänger hinzufügen (zweiter Parameter ist optional);
$mail->addReplyTo('test@prowect.com', 'Test'); // Empfänger der Antwort-Email
$mail->addAttachment('/test/image.png'); // Anhang hinzufügen
$mail->isHTML(true); // HTML Email Format

$mail->Subject = 'Here is the subject'; // Betreff
$mail->Body = 'This is the body for HTML mail clients'; // Nachricht
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; // Alternativ wenn HTML nicht unterstützt wird

if(!$mail->send()) {
    // Email konnte nicht gesendet werden
} else {
    // Email wurde erfolgreich gesendet
}
```