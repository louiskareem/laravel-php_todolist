@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Lists</div>
<!--                     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
 -->                    <br>

                    <form action="{{ action('RecordController@store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                            <div class="row">
                                @foreach($records as $record)
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <h3>{{ $record->name }}</h3>
                                                @foreach($record->tasks as $task)
                                                    @if($task->description !== 'No_task')
                                                        <a class="lead" href="{{ action('TaskController@index', $task->id) }}">{{ $task->description }}</a><br>
                                                    @else
                                                        <a style="display: none;" class="lead" href="{{ action('TaskController@index', $task->id) }}">{{ $task->description }}</a><br>
                                                    @endif
                                                @endforeach
                                                @foreach($record->tasks as $task)
                                                    @if($task->description === 'No_task')
                                                        <a class="btn btn-default" href="{{ action('TaskController@index', $task->id) }}">Add Task</a>
                                                    @endif
                                                @endforeach                                               
                                                <a class="btn btn-info" href="{{ action('RecordController@edit', $record->id) }}">Edit</a>
                                                <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <br>
                        <input class="form-control" type="text" name="name" placeholder="Type here to add a new list...">
                        <br>
                        <button type="submit" class="btn btn-success">Add List</button>
                    </form>     

                    <div id="deleteModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-footer">
                                    <form action="{{ action('RecordController@delete', $record->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>

</script>
@endsection