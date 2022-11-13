@extends('HomePage.layout')
@section('content')
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{ session('error') }}
  @endif
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Data Inventaris</h3>
                    </div>

                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Label</th>
                                <th>Stock</th>
                                <th>Tanggal Input</th>
                                @if(auth()->user()->level == 'admin')
                                <th width="280px">Action</th>
                                @endif
                            </tr>
                            @foreach ($paginate as $m)
                            <tr>

                                <td>{{ $m -> barang -> nama_barang }}</td>
                                <td>{{ $m -> label -> nama_label }}</td>
                                <td>{{ $m -> stock }}</td>
                                <td>{{ $m -> created_at }}</td>
                                @if(auth()->user()->level == 'admin')
                                <td>
                                    <form action="{{ route('inventaris.destroy',$m->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                        @if(auth()->user()->level == 'admin')
                        <div class="float-right mt-2">
                            <a class="btn btn-success" href="{{ route('inventaris.create') }}"> Input Barang</a>
                        </div>
                        @endif
                        <div class="float-right mt-2">
                            <a class="btn btn-primary" href="/cetakbarangmasuk"> Cetak Laporan</a>
                        </div>
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