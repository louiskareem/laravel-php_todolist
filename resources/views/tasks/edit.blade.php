@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Task</div>
                    <form action="{{ action('TaskController@update', $task->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-block">
                                        <label>Description</label>
                                    	<input class="form-control" type="text" name="description" placeholder="{{ $task->description }}">
                                        <label>Status</label>
                                        <input class="form-control" type="text" name="status" placeholder="{{ $task->status }}">
                                        <label>Duration</label>
                                        <input class="form-control" type="text" name="duration" placeholder="{{ $task->duration }} minutes">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <a href="{{ url('tasks', $task->id) }}" class="btn btn-warning">Return</a> 
            </div>
        </div>
    </div>
</div>

@endsection