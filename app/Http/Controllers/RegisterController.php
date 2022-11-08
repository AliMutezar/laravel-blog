<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('template.register', [
            "title"     =>  "Register",
            "active"    =>  "register"
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name"      =>  ['required', 'max:255'],
            "username"  =>  ['required', 'max:255', 'min:3', 'unique:users'],
            "email"     =>  ['required','email:dns','unique:users'],
            "password"  =>  ['required', 'min:8', 'max:255']
        ]);

        // security using hash
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Registered account was successful');
    }
}
