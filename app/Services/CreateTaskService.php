<?php

namespace App\Services;

use App\Task;
use Illuminate\Support\Facades\Validator;

class CreateTaskService
{
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
        if ( ! $validator->validate()) {
            return formatResponse(null, $validator->errors());
        }

        $task = Task::create([
            'name' => $this->request->input('task')
        ]);

        return formatResponse($task->id);
    }
}
