<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Barang;
use App\Models\User;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::count();
        $label = Label::count();
        $akun = User::count();
        return view('homepage.index', compact('barang', 'label', 'akun'));
    }
    public function gantirole()
    {
        $akun = User::all();
        
        return view('PegawaiPage.gantirole', compact('akun'));
    }
    public function editrole($id)
    {
        $akun = DB::table('users')->where('id',$id)->first();
        
        return view('PegawaiPage.editrole', compact('akun'));
    }
    public function updaterole(Request $request,$id)
    {
        $akun2 = $request->get('level');
        $akun = DB::table('users')->where('id',$id)->update('level',$akun2);
        return redirect()->route('admin.gantirole');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function pengembalian(){
        $pengembalian = Pengembalian::orderBy('id', 'asc')->paginate(5);
        $mobil = Mobil::all();
        $pegawai = Pegawai::all();
        $user=User::all();
        return view('Pengembalian.admin',(compact('pengembalian', 'mobil', 'pegawai','user')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ganti($id,$sewaid)
    {
        $sewa = Pengembalian::find($id);
        $sewa->pengembalian = 'sudah';
        $sewa->save(); 
        $sewa2 = Sewamobil::find($sewaid);
        $sewa2->pengembalian = 'sudah';
        $sewa2->save(); 

        return redirect('/pengembalian2');
    }
    public function cetakpengembalian()
    {
        $paginate = Pengembalian::all();
        $pdf = PDF::loadview('Pengembalian.cetak', compact('paginate'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}