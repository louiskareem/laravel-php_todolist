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

        return view('tasks/index', compact('task'));
    }

    public function create()
    {
        return view('tasks/add');
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        $task = new Task;
        $task->description = $request->description;
        $task->duration = $request->duration;
        $task->status = $request->status;
        $task->record_id = $request->record_id;

        // $record = Task::findOrFail($id);
        // $task->record_id = $record->record_id;
        // if ($task->record_id !== NULL) {
        //     if ($task->record_id === $record = Record::where('id', $task->record_id)->first()) {
        //         $task->record_id = $record->id;
        //     }
        // }else{
        //     $task->record_id = $record->id;
        // }
        $task->save();

        return redirect('lists');
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
