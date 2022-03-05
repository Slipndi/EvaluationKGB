<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;


class AdminController extends Controller
{
    /**
     * Check user in database
     *
     * @param  Request $request
     * @return void
     */
    public function checkAuth(Request $request) {
        // Validation des entrées utilisateurs
        $credentials = $request->validate([
            'email' => ['email', 'required'],
            'password' =>['required']
        ]);
        // Si l'utilisateur est reconnu dans la BDD
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view('index');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return view('index');
    }

}
