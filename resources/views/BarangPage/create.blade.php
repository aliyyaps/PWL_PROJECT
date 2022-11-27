@extends('HomePage.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 mt-3">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Garam</h3>
                    </div>

                    <form method="post" action="{{ route('barang.store') }}" enctype="multipart/form-data" class="p-3">
                        @csrf
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang" aria-describedby="jenis_mobil">
                        </div>
                        <div class="form-group">
                            <label for="nama_label">Label</label>
                            <select class="form-control" name="nama_label">
                                @foreach($label as $mrk)
                                <option value="{{ $mrk ->id }}">{{$mrk->nama_label}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar Barang</label>
                            <input type="file" class="form-control" required="required" name="image">
                        </div>
                        <div class="form-group">
                            <label for="berat">Berat Barang</label>
                            <input type="number" name="berat" class="form-control" id="berat" aria-describedby="berat" required="required">
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan Berat</label>
                            <select class="form-control" name="satuan" required="required">
                                <option value="Kg">Kg</option>
                                <option value="Hg">Hg</option>
                                <option value="Dag">Dag</option>
                                <option value="Gram">Gram</option>
                                <option value="Dg">Dg</option>
                                <option value="Cg">Cg</option>
                                <option value="Mg">Mg</option>
                            </select>
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