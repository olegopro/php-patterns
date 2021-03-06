<?php
namespace Facade;

class Document 
{
    private $db;
    private $log;
    private $mail;


    public function __construct(Db $db, Log $log, Mail $mail) 
    {
        $this->db = $db;
        $this->log = $log;
        $this->mail= $mail;
    }

    public function save($message) {
        
        $this->db->connect();
        $this->db->saveDocument($message);
        $this->log->addLog($message);
        $this->mail->sendMessage($message);

    }
}