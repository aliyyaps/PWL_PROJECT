<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Mobil;
use App\Models\SewaMobil;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
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
        $mobil = Mobil::count();
        $merk = Merk::count();
        $pemesanan = SewaMobil::count();
        $akun = User::where('level', 'penyewa')->count();
        return view('homepage.index', compact('mobil', 'merk', 'pemesanan', 'akun'));
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
