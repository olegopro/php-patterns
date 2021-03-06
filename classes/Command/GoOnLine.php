<?php

namespace Command;

class GoOnLine implements ICommand
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function execute()
    {
        $this->user->goOnLine();
    }

    public function undo()
    {
        $this->user->goOffLine();
    }

    public function redo()
    {
        $this->execute();
    }

}
