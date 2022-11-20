<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Label;
class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $label = Label::orderBy('nama_label', 'asc')->paginate(5);
        return view('LabelPage.label', ['label' => $label]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('LabelPage.create');
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
            'Label' => 'required',
        ]);

        $label = new Label;
        $label->nama_label = $request->get('Label');
        $label->deskripsi = $request->get('Deskripsi');
        $label->save();
        return redirect()->route('label.index')
            ->with('success', 'Label Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $label = Label::find($id);
        return view('LabelPage.detail', ['label' => $label]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $label = DB::table('label')->where('id', $id)->first();
        return view('LabelPage.edit', compact('label'));
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
        $request->validate([
            'nama_label' => 'required',
        ]);

        $label = Label::find($id);
        $label->nama_label = $request->get('nama_label');
        $label->deskripsi = $request->get('deskripsi');
        $label->save();
        return redirect()->route('label.index')
            ->with('success', 'Label Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Label::find($id)->delete();
        return redirect()->route('label.index')
            ->with('success', 'Label Berhasil Dihapus');
    }
}