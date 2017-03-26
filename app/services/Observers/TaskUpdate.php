<?php


class TaskUpdate implements SplObserver,ModelEventAble
{
    protected $type = ModelEventAble::UPDATE;

    public function update(SplSubject $subject)
    {
        NotificationRepository::getInstance()->store(['content' => "Úloha bola úspešne editovaná."]);
    }

    public function getType()
    {
        return $this->type;
    }
}