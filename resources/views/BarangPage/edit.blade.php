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
                <form method="post" action="{{ route('barang.update', $barang->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang" value="{{ $barang->nama_barang }}" readonly='readonly' aria-describedby="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="nama_label">Nama Label</label>
                        <input type="text" name="nama_label" class="form-control" id="nama_label" value="{{ $barang->label->nama_label}}" readonly='readonly' aria-describedby="nama_barang">
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Barang</label>
                        <input type="text" name="harga" class="form-control" id="harga" value="{{ $barang->harga}}" aria-describedby="harga">
                    </div>
                    <div class="form-group">
                        <label for="image">Gambar </label>
                        <input type="file" class="form-control" value="{{$barang->featured_image}}" name="image">
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