<?php

class TaskController
{
    protected $htmlBuilder;
    protected $request;

    public function __construct()
    {
        $this->htmlBuilder = App::get('htmlBuilder');
        $this->request = App::get('request');
    }

    public function create()
    {
        $this->htmlBuilder->setHeader('_parts/header', ['title' => 'Pridať úlou']);
        $this->htmlBuilder->setContent('content/add-task');

        return view();
    }

    public function store()
    {
        ModelFactory::build('task');

        return redirect('');
    }


    public function edit()
    {

        $task = TaskFacade::getById($this->request->get('id'));

        if (!($task && $task->state()->canEdit())) {
            return redirect('');
        }

        $this->htmlBuilder->setHeader('_parts/header', ['title' => 'Editovať úlohu']);
        $this->htmlBuilder->setContent('content/edit-task', ['task' => $task]);

        return view();


    }

    public function update()
    {
        $task = TaskFacade::getById($this->request->get('id'));

        if ($task && $task->state()->canEdit()) {

            TaskRepository::getInstance()->update($task, [
                'name' => $this->request->get('name'),
                'content' => $this->request->get('content'),
                'priority' => $this->request->get('priority'),
                'end' => $this->request->get('end-date'),
                'is_done' => 0,
                'is_edited' => 1,
            ]);
        }

        return redirect('');
    }

    public function destroy()
    {
        TaskRepository::getInstance()->destroy($this->request->get('id'));

        return redirect('');
    }

    public function done()
    {
        $task = TaskFacade::getById($this->request->get('id'));

        if ($task && $task->state()->canClose()) {
            $task->is_done = 1;
            $task->save();
        }

        return redirect('');
    }
}