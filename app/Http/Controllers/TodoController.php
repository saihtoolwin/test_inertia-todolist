<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return Inertia::render('components/ToDoPage', [
            'todos' => $todos,
        ]);
    }


    //     public function store(Request $request)
    // {
    //     $request->validate([
    //         'newtodo' => 'required|string|max:255',
    //     ]);

    //     $todo = Todo::create([
    //         'title' => $request->input('newtodo')
    //     ]);

    //     return response()->json($todo);
    // }

    public function store(Request $request)
    {
        $request->validate([
            'newtodo' => 'required|string|max:255',
        ]);
        Todo::create([
            'title' => $request->input('newtodo')
        ]);
        return to_route('todos.index');
    }

    public function update(Todo $todo,$id)
    {
        $todo = Todo::findOrFail($id);

        $todo->status = 'completed';
        $todo->save();
        return to_route('todos.index');
    }

    public function destroy(Todo $todo,$id)
    {
        
        $todo->findOrFail($id)->delete();
        return back();
    }
}
