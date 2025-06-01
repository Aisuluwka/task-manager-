<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    
    public function index()
    {
        return Task::all();
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        return Task::create($request->only(['title', 'description', 'due_date']));
    }

    
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $task->update($request->only(['title', 'description', 'due_date']));

        return $task;
    }
    
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Задача удалена']);
    }
}
