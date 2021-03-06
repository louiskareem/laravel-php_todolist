@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Task</div>
                    <form action="{{ action('RecordController@update', $record->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-block">
                                    	<input class="form-control" type="text" name="name" placeholder="{{ $record->name }}">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-warning" href="{{ url('lists') }}">Return</a> 
            </div>
        </div>
    </div>
</div>

@endsection