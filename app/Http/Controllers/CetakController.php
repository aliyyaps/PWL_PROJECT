<?php

namespace App\Http\Controllers;

use App\Models\SewaMobil;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $paginate = Transaksi::all();
        $pdf = PDF::loadview('BarangPage.laporantransaksi', compact('paginate'));
        $pdf->setPaper('F4', 'landscape');
        return $pdf->stream();
    }

}