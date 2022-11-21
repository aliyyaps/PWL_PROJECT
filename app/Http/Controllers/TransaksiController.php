<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Barang;
use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('label')->get();
        $paginate = Barang::orderBy('nama_barang', 'asc')->paginate(5);
        return view('BarangPage.barang', ['barang' => $barang, 'paginate' => $paginate]);
    }
    public function pesanan()
    {
        $transaksi = Transaksi::with('label','barang','user')->get();
        $paginate = Transaksi::orderBy('id', 'asc')->paginate(5);
        return view('BarangPage.pesanan', ['transaksi' => $transaksi, 'paginate' => $paginate]);
    }
    public function pesanan2()
    {
        $transaksi = Transaksi::with('label','barang','user')->get();
        $paginate = Transaksi::orderBy('id', 'asc')->where('users_id',Auth::user()->id)->paginate(5);
        return view('BarangPage.pesanan', ['transaksi' => $transaksi, 'paginate' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',

        ],[
            'jumlah.integer'=>'Masukkan Jumlah Dengan Benar '
        ]);
        $transaksi = new Transaksi;
        $barang = Barang::with('label')->where('id', $request->get('barang_id'))->first();
        $transaksi->barang_id = $barang->id;
        $transaksi->label_id = $barang->label_id;
        $transaksi->users_id = Auth::user()->id;
        $namaorang=DB::table('users')->where('id',Auth::user()->id)->first();
        $transaksi->harga = $barang->harga;
        $transaksi->namaorang = $namaorang->name;
        $transaksi->jumlah = $request->get('jumlah');
        $transaksi->save();
        return redirect()->route('transaksi.index');
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
    public function edit($id)
    {
        $barang = Barang::with('label')->where('id', $id)->first();
        return view('BarangPage.pembelian', compact('barang'));
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
        
    }
    public function update2(Request $request, $id)
    {
        $transaksi = Transaksi::with('label','barang','user')->where('id', $id)->first();
        $barang = Barang::with('label')->where('id', $transaksi->barang_id)->first();
        $transaksi->status='Sudah Diproses';
        $inventaris=new Inventaris;
        $inventaris->label_id=$transaksi->label_id;
        $inventaris->barang_id=$transaksi->barang_id;
        $inventaris->stocklama=$barang->stock;
        $barang->stock=$barang->stock-$transaksi->jumlah;
        $inventaris->stock=$transaksi->jumlah;
        $inventaris->stockbaru=$barang->stock;
        $inventaris->status="Barang Keluar";
        $barang->save();
        $transaksi->save();
        $inventaris->save();
        return redirect('/pemesananmasuk');
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