<?php


class TaskFacade
{
    public static function getById($id)
    {
        return self::getModel()::where('id', $id)->first();
    }

    public static function getDone()
    {
        return self::getModel()::where('is_done', 1)->orderBy('end', 'asc')->get();
    }

    public static function getOpened()
    {
        return self::getModel()::where('is_done', 0)->orderBy('end', 'asc')->get();
    }

    public static function getModel()
    {
        return Task::class;
    }

}