<?php

namespace Facade;

class Mail
{
    private $to;
    private $subject;
    private $message;
    private $header;

    public function __construct($to, $subject, $message, $header)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->header = $header;
    }



    public function sendMessage($message)
    {
        mail($this->to, $this->subject, $this->message, $this->header);
    }

}
