@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Tasks</div>
                    <form action="{{ action('ListController@store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                            <div class="row">
                                @foreach($tasks as $task)
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <h3 class="card-title"><a href="{{ url('todo/index') }}">{{ $task->name }}</a></h3>
                                                <p class="card-text">{{ $task->description }}</p>
                                                <button class="btn btn-info">Edit Task</button>
                                                <button class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        <input class="form-control" type="text" name="name" placeholder="Type here..."><br>
                        <button type="submit" class="btn btn-success">Add Task</button>
                    </form>

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
