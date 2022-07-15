<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all(); //mesma função do get()
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function show(string $id)
    {
        //opção de debug
        // dd('users.show', $id);
        $user = User::where('id', $id)->first();
        // dd($user);
        return view('users.show', compact('user'));
    }
}
