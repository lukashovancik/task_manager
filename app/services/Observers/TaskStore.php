<?php


class TaskStore implements SplObserver,ModelEventAble
{
    protected $type = ModelEventAble::STORE;

    public function getType()
    {
        return $this->type;
    }

    public function update(SplSubject $subject)
    {
        NotificationRepository::getInstance()->store(['content' => "Nová úloha bola úspešne uložená."]);
    }
}