<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        return view('LOGIN/login', ['tittle' => 'Login']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->id_peran == 1){
                session()->put('custom_data', $credentials);
                // dd(Auth::user()->nama_lengkap);
                return redirect()->intended('/admin');
            }
            else if(Auth::user()->id_peran == 2){
                session()->put('custom_data', $credentials);
                return redirect()->intended('/');
            }
        }

        return back()->with('LoginError','Login Gagal!');
    }
}

