<?php

namespace Observer;

class SendMailPlugin implements \SplObserver
{
    public function update(\SplSubject $obj, string $event = NULL, $data = NULL)
    {
        echo 'Send Email';
        //mail();
    }
}
