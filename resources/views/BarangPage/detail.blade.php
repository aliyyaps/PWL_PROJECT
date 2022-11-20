@extends('HomePage.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" >
            <div class="card-header mt-2">
                Detail Data Barang
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Nama Barang </b>{{$barang->nama_barang}}</li>
                </ul>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Deskripsi Barang </b>{{$barang->label->deskripsi}}</li>
                </ul>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><img width="100" height="100" src="{{ asset('storage/'.$barang->featured_image) }}"></li>
                </ul>
            </div>
            
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <tr>
                        <th>Harga Lama</th>
                        <th>Harga Baru</th>
                        <th>Orang yang mengubah</th>
                        {{-- <th>User Yang <br>Mengganti</th> --}}
                        <th>Tanggal Perubahan</th>
                        {{-- @if(auth()->user()->level == 'admin')
                        <th width="280px">Action</th>
                        @endif --}}
                    </tr>
                    @foreach ($log as $m)
                    <tr>
                       
                        {{-- <td>{{ $m -> barang -> nama_barang }}</td>
                        <td>{{ $m -> label -> nama_label }}</td>
                        <td>{{ $m -> users -> name }}</td>
                        <td>{{ $m -> harga }}</td>
                        <td>{{ $m -> hargabaru }}</td>
                        <td>{{ $m -> created_at }}</td> --}}
                        <td>{{ $m -> harga }}</td>
                        <td>{{ $m -> hargabaru }}</td> 
                        <td>{{ $m -> namaorang }}</td>
                        {{-- <td>{{ $m -> user -> name }}</td> --}}
                        <td>{{ $m -> created_at }}</td>

                    </tr>
                    @endforeach
                </table>
                {{-- @if(auth()->user()->level == 'admin')
                <div class="float-right mt-2">
                    <a class="btn btn-success" href="/inputbarangkeluar"> Input Barang Keluar</a>
                </div>
                @endif --}}
                {{-- <div class="float-left mt-2">
                    {{ $inventaris->links() }}
                </div> --}}
            </div>
            <a class="btn btn-success mt-3 mb-2" href="{{ route('barang.index') }}">Kembali</a>
        </div>
    </div>
</div>

@endsection