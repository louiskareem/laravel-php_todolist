<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Record;
use App\Task;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$records = Record::all();

    	return view('lists/index', compact('records'));
    }

    public function store(Request $request)
    {
    	$record = new Record;
    	$record->name = $request->name;
    	$record->save();
        $task = Task::createTask($record->id);
        if ($task->description === null) {
            $task->record_id = $record->id;
            // $task->description = env('TASK_DESCRIPTION');
            // $task->status = env('TASK_STATUS');
            // $task->duration = env('TASK_DURATION');
            $task->save();
        }

    	return redirect('lists');
    }

    public function edit($id)
    {
    	$record = Record::findOrFail($id);

        return view('lists/edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = Record::findOrFail($id);
        $record->name = $request->name;
        $record->save();

        return redirect('lists');
    }

    public function delete(Request $request, $id)
    {
    	$record = Record::findOrFail($id);
    	$record->delete();

    	return redirect('lists');
    }

    public function search(Request $request)
    {
        $data = $request->all();

        dd($data);

        // $profile = Employee::where('employee_id', request()->id)->first();
        
        // //optional, 
        // if(is_null($profile)){
        //     return Response::json('error');
        // }else{
        //     return Response::json('success');
        // }

    }
}
