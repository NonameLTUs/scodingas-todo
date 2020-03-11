<?php

namespace App\Http\Controllers;

use App\Services\CreateTaskService;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return formatResponse(Task::get()->only(['id', 'name']));
    }

    public function create(Request $request)
    {
        return (new CreateTaskService($request))->index();
    }
}
