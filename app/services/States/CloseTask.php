<?php


class CloseTask implements TaskStateInterface
{
    public function canEdit()
    {
        return false;
    }

    public function canClose()
    {
        return false;
    }
}