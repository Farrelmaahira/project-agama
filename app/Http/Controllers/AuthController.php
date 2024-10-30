<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function signIn(Request $req) 
    {
        $credentials = $req->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:8'
        ]);

        if(Auth::attempt($credentials)) {
            return redirect()->intended('/admin/kajian');
        }

        return back()->withErrors([
            'error' => 'The credential not match with our record'
        ])->onlyInput('username');
    }

    public function signOut(Request $req) 

    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }



}
