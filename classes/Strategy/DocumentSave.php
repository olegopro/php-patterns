<?php

namespace Strategy;

class DocumentSave extends BaseSave
{
    public function save()
    {
        if (file_exists('classes/Strategy/tmp/' . $this->filepath)) {
            copy('classes/Strategy/tmp/' . $this->filepath, 'classes/Strategy/documents/' . $this->filepath);
        }
    }
}
