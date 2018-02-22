@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Lists</div>
                    <form action="{{ action('RecordController@store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                            <div class="row">
                                @foreach($records as $record)
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-block">
                                                <h3><a href="{{ action('TaskController@index', $record->task_id) }}">{{ $record->name }}</a></h3>
                                                <a class="btn btn-info" href="{{ action('RecordController@edit', $record->id) }}">Edit</a>
                                                <button data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        <input class="form-control" type="text" name="name" placeholder="Type here..."><br>
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
