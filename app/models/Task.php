<?php

class Task extends Illuminate\Database\Eloquent\Model
{
    public $table = 'tasks';

    public $timestamps = true;
    protected $guarded = [];

    public function state(){
        return new TaskState($this);
    }

}