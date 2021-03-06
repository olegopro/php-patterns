<?php

namespace Command;

class ChatInterface
{
    protected $command;

    public function setCommand (ICommand $command)
    {
        $this->command = $command;
    }

    public function run()
    {
       $this->command->execute();
    }

    public function undo()
    {
       $this->command->undo();
    }

    public function redo()
    {
        $this->command->redo();
    }
}
