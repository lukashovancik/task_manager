<?php


class ModelFactory
{
    public static function build($type)
    {
        switch ($type){
            case 'task':
                $task = TaskRepository::getInstance()->store([
                    'name' => App::get('request')->get('name'),
                    'content' => App::get('request')->get('content'),
                    'priority' => App::get('request')->get('priority'),
                    'end' => App::get('request')->get('end-date'),
                    'is_done' => 0,
                    'is_edited' => 0,
                    'is_open' => 1
                ]);
                return $task;
                break;
            default:
                throw new Exception('Model factory definovaný typ modelu neexistuje.');
        }

        return $obj;
    }
}