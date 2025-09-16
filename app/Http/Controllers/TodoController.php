<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        // $todos = Todo::all();
        return view('todo.index',[
            'todos' => $todos,
        ]);
    }
    public function create()
    {
        // $todos = Todo::where('user_id', '2')->get();
        // $todos = Todo::all();
        return view('todo.create',[
            // 'todos' => $todos,
        ]);
    }

    public function store(Request $request)
    {
        $pesan = [
            'title.required' => 'Title harus diisi',
            'title.min' => 'Title minimal 3 karakter',
            'body.required' => 'Body harus diisi',
        ];

        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ], $pesan);

        // $todo = new Todo();
        // $todo->title = $request->title;
        // $todo->body = $request->body;
        // $todo->user_id = Auth::user()->id;
        // $todo->save();

        Todo::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('todo.index');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit',[
            'todo' => $todo,
        ]);
    }

    public function update(Request $request, $id)
    {
        $pesan = [
            'title.required' => 'Title harus diisi',
            'title.min' => 'Title minimal 3 karakter',
            'body.required' => 'Body harus diisi',
        ];

        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required',
        ], $pesan);

        $todo = Todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save();
        
        return redirect()->route('todo.index');
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
