<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class toDoListController extends Controller
{
    public function saveTask(Request $request) {

        // $task = $request->input('task');
        \Log::info(json_encode($request->all()));
        return view('welcome');
    }
}
