<?php

namespace App\Services;

use App\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UpdateTaskService
{
    private $request;
    private $id;

    public function __construct($request, $id)
    {
        $this->request = $request;
        $this->id      = $id;
    }

    private function makeValidator()
    {
        $inputs = $this->request->only(['task']);
        $rules  = [
            'task' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique(Task::class, 'task')->ignore($this->id)
            ]
        ];

        return Validator::make($inputs, $rules);
    }

    public function index()
    {
        $validator = $this->makeValidator();
        if ($validator->fails()) {
            return formatResponse(null, $validator->errors()->all());
        }

        $task = Task::find($this->id);
        if (null === $task) {
            return formatResponse(null, ['Task not found']);
        }
        $task->task = $this->request->input('task');
        $task->save();

        return formatResponse();
    }
}
