<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facadades\Auth;

class LoginCOntroller
{
    public function index()
    {
        return view ('login.index');
    }
    public function store(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password'])))
        {
            return redirect()->back()->withErrors('Usuário ou senha inválidos');
        }
    }
}