<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
class RegisterController extends Controller
{
    public function index()
    {
    //fungsi eloquent menampilkan data menggunakan pagination
    $user = DB::table('users')->get(); // Mengambil semua isi tabel
    return view('RegisterPage.register');
    }
    // public function create(){
    //     return view('RegisterPage.register');
    // }
    public function store(Request $request){
         //melakukan validasi data
        $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
    ],[
        'email.unique' => 'Email Sudah Digunakan.',
    ]);
        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/')->with('success', 'User Berhasil Ditambahkan');
}
}