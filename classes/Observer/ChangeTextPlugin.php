<?php

namespace Observer;

class ChangeTextPlugin implements \SplObserver
{
    public function update(\SplSubject $obj, string $event = NULL, $data = NULL)
    {
        if (isset($obj->text)){
            $obj->text .= ' Create event ';
        }
    }
}
