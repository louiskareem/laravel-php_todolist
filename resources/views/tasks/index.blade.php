@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

@if (count($task) > 0)
                <h2 class="card-header">{{ $task->record->name }}</h2>
                    <form action="{{ action('TaskController@store', $task->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <div class="card-block">
                                        <br>

                                        <label>Description</label>
                                        @if($task->description !== NULL)
                                            <input class="form-control" type="text" placeholder="{{ $task->description }}" name="description">
                                        @else
                                            <input class="form-control" type="text" placeholder="There's no description for this task" name="description">
                                        @endif

                                        <label>Status</label>
                                        @if($task->status !== NULL)
                                            <input class="form-control" type="text" placeholder="{{ $task->status }}" name="status">
                                        @else
                                            <input class="form-control" type="text" placeholder="There's no status for this task" name="status">
                                        @endif

                                        <label>Duration</label>
                                        @if($task->duration !== NULL)
                                            <input class="form-control" type="text" placeholder="{{ $task->duration }} minutes" name="duration">
                                        @else
                                            <input class="form-control" type="text" placeholder="There's no duration for this task" name="duration">
                                        @endif                                        

                                        <br>
                                        @if($task->description !== NULL)
                                            <a class="btn btn-info" href="{{ action('TaskController@edit', $task->id) }}">Edit task</a>
                                        @endif
                                        <br>
                                        <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</button><hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <button data-toggle="modal" data-target="#addModal" class="btn btn-success col-sm-6">Add Task</button><br>

                    <a href="{{ url('lists') }}" class="btn btn-warning col-sm-6">Return</a>

                    <div id="addModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-footer">
                                    <form action="{{ action('TaskController@store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input style="display: none" value="{{ $task->record_id }}" name="record_id">
                                        <label>Description</label>
                                        <input class="form-control" type="text" name="description">

                                        <label>Status</label>
                                        <input class="form-control" type="text" name="status">

                                        <label>Duration</label>
                                        <input class="form-control" type="text" name="duration">

                                        <br>
                                        <button type="submit" class="btn btn-success">Add Task</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="deleteModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-footer">
                                    <form action="{{ action('TaskController@delete', $task->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
@else
    I don't have any records!
@endif

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    .$(document).ready(function() {
        
    });
</script>
@endsection