<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\Record;

class TaskController extends Controller
{
    public function index($id)
    {
        $task = Task::findOrFail($id);
        // $tasks = Task::all();

        return view('tasks/index', compact('task'));
    }

    public function create()
    {
        return view('tasks/add');
    }

    public function store(Request $request)
    {
        // $task = new Task;
        // $task->name = $request->name;
        if ($request->id === $record->task_id) {
            $task->name = $request->name;
        }else{
            $task = new Task;
            $task->name = $request->name;
            $task->record_id;
        }
        $task->save();

        return redirect('tasks/{id}');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        
        return view('tasks/edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        // $task = Task::findOrFail($id);
        // $task->name = $request->name;
        // $task->save();

        // return redirect('tasks/index');
    }

    public function delete(Request $request, $id)
    {
        // $task = Task::findOrFail($id);
        // $task->delete();

        // return redirect('tasks/index');
    }

    public function show($id)
    {
        $record = Record::findOrFail($id);

        return view('tasks/index', compact('record'));
    }
}
