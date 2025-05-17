<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $userName = auth()->user()->name;
        
        $Tasks = Task::all();
        return view('folder-task.index')->with([
            'userId' => $userId,
            'userName' => $userName,
            'Tasks' => $Tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user_id)
    {
        return view('folder-task.create')->with('user_id', $user_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'task_title' => 'required',
            'status' => 'required',
            'task_description' => 'required',
            'deadline' => 'required|date',
        ]);

        $newTask = Task::create($data);
        
        if($newTask){
            return redirect()->route('intern.task.index');
        } else{
            return back()->with('error', 'Failed to create new task.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $user_id = auth()->user()->id;
        
        return view('folder-task.edit')->with([
            'Task' => $task,
            'user_id' => $user_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'task_title' => 'required',
            'status' => 'required',
            'task_description' => 'required',
            'deadline' => 'required|date',
        ]);

        $task->update($data);

        if($data){
            return redirect()->route('intern.task.index');
        }
    }

    public function updateStatus(Request $request, Task $task)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $updated = $task->update($data);

        if ($updated) {
            return redirect()->route('intern.task.index')->with('success', 'Task status updated.');
        } else {
            return back()->withInput()->with('error', 'Failed to update task status.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $confirmDelete = $task->delete();
        if($confirmDelete){
            return redirect()->route('intern.task.index');
        }
        
    }
}
