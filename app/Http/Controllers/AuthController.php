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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
