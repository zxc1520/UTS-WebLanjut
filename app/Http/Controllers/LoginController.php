<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('login', ['title' => 'Login']);
    }

    public function authenticate(Request $req)
    {
        # code...
        $credentials = $req->validate([
            'emaill' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            # code...
            $req->session()->regenerate();
            return redirect()
                    ->intended('/dashboard')
                    ->with('toast_success', 'berhasil login');
        }

        return back()->withErrors('errors', 'Kesalahan Login');
    }

    public function logout(Request $req)
    {
        # code...
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/')->with('toast_info', 'Anda telah logout');
    }
}
