<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function addTodo(Request $request)
    {
        $request->validate([
            'task' => 'required',
        ]);

        $list = $request->all();
        // Validate that 'task' is required

        Todo::create($list);
        return redirect()->route('show.todo');
    }

    public function showTodo()
    {
        $fetch = Todo::orderBy("created_at", 'desc')->get();
        return view('todo.show_todo', compact('fetch'));
    }

    public function deleteTodo($id)
    {
        $task = Todo::findOrFail($id);  // Find the task by its ID
        $task->delete();  // Delete the task

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }

    public function editTodo($id)
    {
        $fetch = Todo::get();
        $data = Todo::find($id);
        return view('todo.edit', compact('fetch', 'data'));
    }

    public function updateStatus($id, $status)
    {
        // dd($status);
        $task = Todo::findOrFail($id);
        $task->status = $status;
        $task->save();
        return redirect()->route('show.todo')->with('success', 'Task status updated successfully.');
    }

    function updateTask(Request $request, $id)
    {
        $request->validate([
            'task' => 'required',
        ]);
        $data = Todo::find($id);
        $data->task = $request->input('task');


        $data->save();
        return redirect()->route('show.todo');
    }
}
