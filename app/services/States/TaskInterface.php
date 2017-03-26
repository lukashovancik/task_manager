<?php

interface TaskInterface
{
    CONST STATE_EDIT = 1;
    CONST STATE_CLOSE = 2;

    public function setState(TaskStateInterface $state);
    public function getState($id);
}