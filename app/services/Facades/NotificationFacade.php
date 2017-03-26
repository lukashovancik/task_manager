<?php

class NotificationFacade
{
    public static function isRead()
    {
       return self::getModel()::where('is_readed',0)->get();
    }

    public static function getModel()
    {
        return Notification::class;
    }
}