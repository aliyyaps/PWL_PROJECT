@extends('HomePage.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
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
            <a class="btn btn-success mt-3 mb-2" href="{{ route('barang.index') }}">Kembali</a>
        </div>
    </div>
</div>

@endsection