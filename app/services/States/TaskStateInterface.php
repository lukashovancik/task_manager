<?php


interface TaskStateInterface
{
    public function canEdit();
    public function canClose();
}