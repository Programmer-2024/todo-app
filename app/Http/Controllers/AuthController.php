<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function process(Request $request) {
        
        //set validation
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        //get email and password from request
        $credentials = $request->only('email', 'password');

        //attempt to login
        if (Auth::attempt($credentials)) {

            // dd('Ada');

            //regenerate session
            $request->session()->regenerate();

            //  // Set session untuk pesan toast
            // session()->flash('toast', 'Login berhasil!');

            // //redirect route dashboard
            // return redirect()->route('my.dashboard.index');

        }

        //if login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
