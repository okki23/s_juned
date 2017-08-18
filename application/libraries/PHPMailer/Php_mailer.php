<?php
if(!defined('BASEPATH')) exit('No direct script access allowed!');

require_once 'class.phpmailer.php';

class Php_mailer extends PHPMailer
{
    public function __construct($exceptions = false)
    {
        parent::__construct($exceptions);
    }
    
    public function clearAll()
    {
        $this->clearAddresses();
        $this->clearAllRecipients();
        $this->clearAttachments();
        $this->clearBCCs();
        $this->clearCCs();
        $this->clearCustomHeaders();
        $this->clearReplyTos();
    }
}