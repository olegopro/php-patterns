<?php

namespace Command;

interface ICommand
{
    public function execute();

    public function undo();

    public function redo();

}
