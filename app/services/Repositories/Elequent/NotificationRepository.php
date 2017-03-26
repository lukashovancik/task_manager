<?php


use Illuminate\Database\Eloquent\Model;

class NotificationRepository implements Repository
{
    private $model;

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

    public function store($params)
    {

        return $this->model->create($params);
    }

    public function update(Model $model,$params)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * GET METHODS
     */

    public function getModel()
    {
        return new Notification();
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