<?php


class TaskState implements TaskInterface
{
    protected $state;
    protected $states = [];
    protected $task;

    /**
     * Task constructor.
     * @param $type
     */
    public function __construct($task)
    {
        $this->task = $task;

        $this->states[TaskInterface::STATE_CLOSE] = new CloseTask($this);
        $this->states[TaskInterface::STATE_EDIT] = new EditTask($this);

        if ($task->is_done) {

            $this->state = $this->getState(TaskInterface::STATE_CLOSE);

        } else {

            $this->state = $this->getState(TaskInterface::STATE_EDIT);
        }

    }

    public function canClose()
    {
        return $this->state->canClose();
    }

    public function canEdit()
    {
        return $this->state->canEdit();
    }

    public function setState(TaskStateInterface $state)
    {
        $this->state = $state;
    }

    public function getState($stateId)
    {
        return $this->states[$stateId];
    }
}