<?php

class Validator
{
    protected $request;
    protected $rules;
    protected $errors = [];

    /**
     * Validator constructor.
     */
    public function __construct()
    {
        $this->request = App::get('request');
    }

    public function validate()
    {
        $rules = [
            'describe' => 'string',
            'end-date' => 'date',
            'name' => 'string'
        ];

        foreach ($rules as $input => $rule) {
            $rs = explode(',', $rule);
            foreach ($rs as $r) {
                switch ($r) {
                    case 'string':
                        if (!filter_var($this->request->get($input), FILTER_SANITIZE_STRING)) {
                            $this->errors[] = "Input {$input} is not string";
                        }
                        break;
                    case 'date':

                        if (!filter_var($this->request->get($input), FILTER_SANITIZE_STRING)) {
                            $this->errors[] = "Input {$input} is not string";
                        }
                        break;
                }
            }
        }

        dd($this->errors);


    }


}