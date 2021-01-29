<?php

namespace Strategy;

class BaseLogic extends BaseSave
{
    private $saver;

    public function __construct(IFileSave $saver)
    {
        $this->saver = $saver;
    }

    public function execute()
    {
        $this->saver->save();

        return TRUE;
    }

}
