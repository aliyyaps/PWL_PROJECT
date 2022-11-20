@extends('HomePage.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 mt-3">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Masukkan Data Barang Yang Akan Dimasukkan</h3>
                    </div>

                    <form method="post" action="{{ route('inventaris.store') }}" enctype="multipart/form-data" class="p-3">
                        @csrf
                        <div class="form-group">
                            <label for="id">Id Barang</label>
                            <input type="text" name="id" class="form-control" id="id" value="{{ $barang->id }}" readonly='readonly' aria-describedby="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{ $barang->nama_barang }}" readonly='readonly' aria-describedby="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="nama_label">Nama Label</label>
                            <input type="text" name="nama_label" class="form-control" id="nama_label" value="{{ $barang->label->nama_label}}" readonly='readonly' aria-describedby="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="stock">Masukkan Stok</label>
                            <input type="text" name="stock" class="form-control" id="stock" placeholder="Masukkan stock">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection