@extends('HomePage.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Data Barang
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('transaksi.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="barang_id" class="form-control" id="barang_id" value="{{ $barang->id}}" readonly='readonly' aria-describedby="barang_id">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{ $barang->nama_barang }}" readonly='readonly' aria-describedby="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_label">Nama Label</label>
                        <input type="text" name="nama_label" class="form-control" id="nama_label" value="{{ $barang->label->nama_label}}" readonly='readonly' aria-describedby="nama_barang">
                    </div>
                    <div class="form-group">
                        
                        <input type="hidden" name="label_id" class="form-control" id="label_id" value="{{ $barang->label_id}}" readonly='readonly' aria-describedby="label_id">
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat Barang</label>
                        <input type="number" name="berat" class="form-control" id="berat" value="{{ $barang->berat}}" readonly='readonly' aria-describedby="berat">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="number" name="harga" class="form-control" id="harga" value="{{ $barang->harga}}" readonly='readonly' aria-describedby="harga">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah Barang</label>
                        <input type="number" name="jumlah" class="form-control" id="jumlah" value="0" aria-describedby="jumlah">
                    </div>
                    {{-- <div class="form-group">
                        <label for="nama_label">Nama Label</label>
                        <select class="form-control" name="nama_label">
                            @foreach($label as $mrk)
                            <option value="{{$mrk->id}}" {{ $barang->label_id == $mrk->id ? 'selected' : '' }}>{{$mrk->nama_label}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection