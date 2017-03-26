<?php

use Illuminate\Database\Eloquent\Model;

class TaskRepository implements Repository, SplSubject
{
    private $model;
    private $typeEvent;

    private $observables = [
        ModelEventAble::STORE => [],
        ModelEventAble::UPDATE => [],
        ModelEventAble::DESTROY => []
    ];

    public static $instance = null;

    private function __construct()
    {
        $this->model = $this->getModel();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * REPOSITORY METHODS
     */


    public function store($params)
    {
        $this->typeEvent = ModelEventAble::STORE;
        $this->notify();
        return $this->model->create($params);
    }

    public function update(Model $model, $params)
    {
        $this->typeEvent = ModelEventAble::UPDATE;
        $this->notify();

        return $model->update($params);
    }

    public function destroy($id)
    {
        $this->typeEvent = ModelEventAble::DESTROY;
        $this->notify();

        return $this->model->destroy($id);
    }

    /**
     * SPL SUBJECT METHODS
     */

    public function attach(SplObserver $observer)
    {
        array_push($this->observables[$observer->getType()], $observer);
    }


    public function detach(SplObserver $observer)
    {
        $key = array_search($observer, $this->observables, true);
        if ($key) {
            unset($this->observables[$key]);
        }
    }

    public function notify()
    {
        foreach ($this->observables[$this->typeEvent] as $value) {
            $value->update($this);
        }
    }

    /**
     * GET METHODS
     */

    public function getModel()
    {
        return new Task();
    }

    /**
     * PHP MAGIC METHODS
     */

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }
}