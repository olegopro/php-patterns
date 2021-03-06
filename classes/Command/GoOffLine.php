<?php

namespace Command;

class GoOffLine implements ICommand
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute()
    {
        $this->user->goOffLIne();
    }

    public function undo()
    {
        $this->user->goOnLine();
    }

    public function redo()
    {
        $this->execute();
    }

}
