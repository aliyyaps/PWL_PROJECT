<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        return view('LoginPage.login');
    }
    public function login(Request $request)
    {
        $credentials = $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $level = Auth::user()->level;
            if ($level == "admin") {
                return redirect()->to('admin');
            } else if ($level == "pengguna") {
                return redirect()->to('pengguna');
            } else {
                return redirect()->to('/');
            }
        }else{
            return back()->with('loginError','Login Error');
        }
       
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}