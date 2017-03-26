<?php


class TaskDestroy implements SplObserver,ModelEventAble
{
    protected $type = ModelEventAble::DESTROY;

    public function getType()
    {
        return $this->type;
    }

    public function update(SplSubject $subject)
    {
        NotificationRepository::getInstance()->store(['content' => "Úloha bola úspešne vymazaná."]);
    }
}