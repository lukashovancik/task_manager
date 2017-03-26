<?php


interface ModelEventAble
{
    CONST STORE = 'store';
    CONST UPDATE = 'update';
    CONST DESTROY = 'destroy';

    public function getType();
}