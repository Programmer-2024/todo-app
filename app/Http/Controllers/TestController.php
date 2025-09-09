<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index($name)
    {
        $usersORM = User::with('todos')->get();
        $usersQuery = DB::table('users')->get();

        return $usersORM;


        // $greeting = '<h1>Hello ' . $name. '</h1>';
        // return view('test.index', [
        //     'greeting' => $greeting,
        // ]);
    }
}
