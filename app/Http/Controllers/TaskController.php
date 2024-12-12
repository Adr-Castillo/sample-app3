<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tasks;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tasks::all();
        // return response()->json($tasks);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name'=> ['required'],
            'task'=>['required', 'max:50'],
            // 'user_id' => ['required','exists:users, id']
        ]);


        $task = Tasks::create($data);

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();
        return response()->noContent();
    }
}
