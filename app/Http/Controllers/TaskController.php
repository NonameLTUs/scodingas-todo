<?php

namespace App\Http\Controllers;

use App\Services\CreateTaskService;
use App\Services\UpdateTaskService;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return formatResponse(Task::get(['id', 'task']));
    }

    public function store(Request $request)
    {
        return (new CreateTaskService($request))->index();
    }

    public function update(Request $request, $id)
    {
        return (new UpdateTaskService($request, $id))->index();
    }

    public function destroy($id)
    {
        Task::destroy($id);

        return formatResponse();
    }
}
