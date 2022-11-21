@extends('HomePage.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Data Pesanan</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <th>Gambar Barang</th>
                                <th>Nama Barang</th>
                                <th>Label</th>
                                <th>Tanggal <br> Pemesanan Barang</th>
                                @if(auth()->user()->level=='admin')
                                <th>User Yang <br>Memesan</th>
                                @endif
                                <th>Jumlah <br> Yang Dibeli</th>
                                <th>Harga <br> Saat Ini</th>
                                <th>Status Pesanan</th>
                            </tr>
                            @foreach ($paginate as $m)
                            <tr>

                                <td><img width="100" height="100" src="{{ asset('storage/'.$m -> barang ->featured_image) }}"></td>
                                <td>{{ $m -> barang -> nama_barang }}</td>
                                <td>{{ $m -> label -> nama_label }}</td>
                                <td>{{ $m -> created_at }}</td>
                                @if(auth()->user()->level=='admin')
                                <td>{{ $m -> namaorang }}</td>
                                @endif
                                <td>{{ $m -> jumlah }}</td>
                                <td>{{ $m -> harga }}</td>
                                @if(auth()->user()->level=='admin')
                                @if($m-> status =='proses')
                                <td><a class="btn btn-success" href="{{url('perubahan/'.$m->id)}}"> Terima Pesanan</a></td>
                                @else
                                <td>Pesan Sudah Diterima</td>
                            @endif
                            @else
                            @if($m->status=='proses')
                            <td>Masih Dalam Proses</td>
                            @else
                            <td>Pesanan Sudah Diterima <br><a class="btn btn-success" href="#">Hubungi Penjual</a></td>
                            @endif
                            @endif
                            </tr>
                            @endforeach
                        </table>
                        {{-- @if(auth()->user()->level == 'admin')
                        <div class="float-right mt-2">
                            <a class="btn btn-success" href="{{ route('barang.create') }}"> Tambah Barang</a>
                        </div>
                        @endif --}}
                        <div class="float-left mt-2">
                            {{ $paginate->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection