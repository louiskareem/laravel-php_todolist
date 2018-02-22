<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Record;

class RecordController extends Controller
{
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
}
