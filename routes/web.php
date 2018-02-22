<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('lists');
});

Auth::routes();

// Lists
Route::get('lists', 'RecordController@index');
Route::post('lists', 'RecordController@store');

Route::get('lists/{id}/edit', 'RecordController@edit');
Route::post('lists/{id}/update', 'RecordController@update');

Route::post('list/{id}', 'RecordController@delete');

// Tasks
Route::get('tasks/{id}', 'TaskController@index');
Route::post('tasks', 'TaskController@store');

Route::get('task/{id}/edit', 'TaskController@edit');
Route::post('task/{id}/update', 'TaskController@update');

Route::post('task/{id}', 'TaskController@delete');

Route::get('lists/task/{id}', 'TaskController@show');
