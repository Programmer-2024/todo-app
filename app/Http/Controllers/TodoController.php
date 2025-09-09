<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', Auth::user()->id)->get();
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
}
