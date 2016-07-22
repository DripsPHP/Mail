<?php

namespace Drips\Mail;

use Drips\Config\Config;
use PHPMailer;

/**
 * Class Mail
 *
 * Mithilfe dieser Klasse können Emails versendet werden.
 * Basierend auf PHPMailer
 *
 * @package Drips\Mail
 */
class Mail extends PHPMailer
{
    /**
     * Erzeugt eine neue Email. Wird noch nicht versendet.
     * Muss nicht konfiguriert werden, nimmt die Konfiguration aus der config
     */
    public function __construct()
    {
        parent::__construct();
        if (Config::get('mail_smtp', false)) {
            $this->isSMTP();
            $this->Host = Config::get('mail_smtp_host');
            $this->SMTPAuth = Config::get('mail_smtp_auth', false);
            $this->Username = Config::get('mail_smtp_username');
            $this->Password = Config::get('mail_smtp_password');
            $this->SMTPSecure = Config::get('mail_smtp_secure');
            $this->Port = Config::get('mail_smtp_port');
        }

        // From:
        if (Config::has('mail_from_email')) {
            if (Config::has('mail_from_name')) {
                $this->setFrom(Config::get('mail_from_email'), Config::get('mail_from_name'));
            } else {
                $this->setFrom(Config::get('mail_from_email'));
            }
        }

        // CC:
        if (Config::has('mail_cc')) {
            $cc = Config::get('mail_cc');
            if (is_array($cc)) {
                foreach ($cc as $c) {
                    $this->addCC($c);
                }
            } else {
                $this->addCC($cc);
            }
        }

        // BCC:
        if (Config::has('mail_bcc')) {
            $bcc = Config::get('mail_bcc');
            if (is_array($bcc)) {
                foreach ($bcc as $c) {
                    $this->addBCC($c);
                }
            } else {
                $this->addBCC($bcc);
            }
        }
    }
}
