<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Label;
use App\Models\Inventaris;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\LogAudity;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $label = Label::all();
        return view('BarangPage.create', ['label' => $label]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',

        ]);

        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }
        $barang = new Barang;
        $barang->nama_barang = $request->get('nama_barang');
        $barang->featured_image = $image_name;
            $idlabel = $request->get('nama_label');
            $label = Label::find($idlabel);
            $barang->label()->associate($label);
        $barang->save();

        return redirect()->route('barang.index')
            ->with('success', 'Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::with('label')->where('id', $id)->first();
        $log=LogAudity::with('user','barang')->where('label_id',$barang->label_id)->where('barang_id',$id)->get();
        return view('BarangPage.detail', ['barang' => $barang,'log'=>$log]);
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
        $label = Label::all(); //mendapatkan data dari table kelas
        return view('BarangPage.edit', compact('barang', 'label'));
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

        if ($request->file('image')!=null) {
            $image_name = $request->file('image')->store('images', 'public');
            $barang = Barang::with('label')->where('id', $id)->first();
            $log=new LogAudity;
            $barang->nama_barang = $request->get('nama_barang');
            $barang->featured_image = $image_name;
            $log->users_id=Auth::user()->id();
            $log->barang_id=$barang->id;
            $log->label_id=$barang->label_id;
            $log->harga=$barang->harga;
            $log->namaorang=Auth::user()->name();
            $barang->harga=$request->get('harga');
            $log->hargabaru=$request->get('harga');
            $barang->save();
            $log->save();
        }else{
            $barang = Barang::with('label')->where('id', $id)->first();
            $log=new LogAudity;
            $barang->nama_barang = $request->get('nama_barang');
            $log->users_id=auth()->user()->id;
            $log->barang_id=$barang->id;
            $log->label_id=$barang->label_id;
            $log->harga=$barang->harga;
            $namaorang=DB::table('users')->where('id',Auth::user()->id)->first();
            $log->namaorang=$namaorang->name;
            $barang->harga=$request->get('harga');
            $log->hargabaru=$request->get('harga');
            $barang->save();
            $log->save();
        }

        return redirect()->route('barang.index')
            ->with('success', 'Barang Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($seri)
    {
        $barang = DB::table('barang')->where('id', $seri)->delete();
        return redirect()->route('barang.index')
            ->with('success', 'Data Barang Berhasil Dihapus');
    }
}