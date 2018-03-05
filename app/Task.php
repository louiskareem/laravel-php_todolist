<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function record() {
        return $this->belongsTo(Record::class);
    }

    public static function createTask($record_id)
    {
    	$task = Task::where('record_id', '=', $record_id)->first();

    	if ($task === NULL) {
	    	$task =  new Task;
	    	$task->record_id = $record_id;
	    	$task->save();
    	}

    	return $task;
    }
}
