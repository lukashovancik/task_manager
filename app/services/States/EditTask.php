<?php

class EditTask implements TaskStateInterface
{

    public function canEdit()
    {
        return true;
    }

    public function canClose()
    {
        return true;
    }
}