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
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
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
        $request->session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}