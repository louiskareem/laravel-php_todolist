@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">

@if (count($task) > 0)
                <div class="card-header">{{ $task->record->name }}</div>
                    <form action="{{ action('TaskController@store', $task->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <div class="card-block">
                                        <br>
                                        <input class="form-control" type="text" name="name" placeholder="Type here..."><br>
                                        <button type="submit" class="btn btn-success">Add Task</button>
                                        <hr>
                                        <label>Description</label>
                                        <p class="form-control">{{ $task->description }}</p>
                                        <label>Status</label>
                                        <p class="form-control">{{ $task->status }}</p>
                                        <label>Duration</label>
                                        <p class="form-control">{{ $task->duration }} minutes</p>
                                        <a class="btn btn-info" href="{{ action('TaskController@edit', $task->id) }}">Edit</a>
                                        <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>     

                    <a href="{{ url('lists') }}" class="btn btn-warning">Return</a>

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

<!--                 <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div> -->
            </div>
        </div>
    </div>
</div>

@endsection
