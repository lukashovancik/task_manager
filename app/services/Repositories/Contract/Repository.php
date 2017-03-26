<?php

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function store($params);
    public function update(Model $model,$params);
    public function destroy($id);
    public function getModel();
}