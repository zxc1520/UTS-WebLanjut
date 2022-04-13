<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('register', ['title' => 'Register']);
    }

    public function store(Request $req)
    {
        # code...
        $validate = $req->validate([
            'name' => 'required|min:5|max:255',
            'email' => 'required|email:dns',
            'password' => 'required|min:5'
        ]);

        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);

        return redirect('/login')->with('regSuccess', 'Registrasi Berhasil, Silahkan Login');
    }
}
