<?php

class HomeController
{
    protected $htmlBuilder;

    public function __construct()
    {
        $this->htmlBuilder = App::get('htmlBuilder');
    }

    public function index()
    {

        $notificationNotReaded = NotificationFacade::isRead();

        foreach ($notificationNotReaded as $notify) {
            $notify->is_readed = 1;
            $notify->save();
        }

        $this->htmlBuilder->setHeader('_parts/header', ['title' => 'Manažment úloh']);
        $this->htmlBuilder->setContent('content/index', ['tasks' => TaskFacade::getOpened(),'notifications' => $notificationNotReaded]);

        return view();
    }

    public function aboutMe()
    {
        $this->htmlBuilder->setHeader('_parts/header', ['title' => 'O mne']);
        $this->htmlBuilder->setContent('content/about-me');

        return view();

    }

    public function history()
    {
        $this->htmlBuilder->setHeader('_parts/header', ['title' => 'História úloh']);
        $this->htmlBuilder->setContent('content/history', ['tasks' => TaskFacade::getDone()]);

        return view();
    }
}