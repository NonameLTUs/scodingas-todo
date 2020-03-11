<?php

namespace App\Services;

use App\Task;
use Illuminate\Support\Facades\Validator;

class CreateTaskService
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    private function makeValidator()
    {
        $inputs = $this->request->only(['task']);
        $rules  = [
            'task' => 'required|min:3|max:255|unique:tasks'
        ];

        return Validator::make($inputs, $rules);
    }

    public function index()
    {
        $validator = $this->makeValidator();
        if ($validator->fails()) {
            return formatResponse(null, $validator->errors()->all());
        }

        Task::create([
            'task' => $this->request->input('task')
        ]);

        return formatResponse();
    }
}
