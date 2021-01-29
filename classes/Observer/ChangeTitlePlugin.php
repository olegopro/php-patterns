<?php

namespace Observer;

class ChangeTitlePlugin implements \SplObserver
{
    public function update(\SplSubject $obj, string $event = NULL, $data = NULL)
    {
       if (isset($obj->title)){
            $obj->title .= ' Create event ';
        }
    }
}
