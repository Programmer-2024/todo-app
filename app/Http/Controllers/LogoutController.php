<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // logout user
        Auth::logout();

        //invalidate session
        $request->session()->invalidate();

        //session regenerate
        $request->session()->regenerateToken();

        //redirect to home
        return redirect()->route('login');
    }
}
