@extends('HomePage.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Mobil</h3>
                    </div>

                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <th>Gambar Mobil</th>
                                <th>Jenis Mobil</th>
                                <th>Varian</th>
                                <th>Plat Nomor</th>
                                <th>Merk</th>
                                <th>Tarif/Hari</th>
                                @if(auth()->user()->level == 'admin')
                                <th width="280px">Action</th>
                                @endif
                            </tr>
                            @foreach ($paginate as $m)
                            <tr>

                                <td><img width="100" height="100" src="{{ asset('storage/'.$m->featured_image) }}"></td>
                                <td>{{ $m -> jenis_mobil }}</td>
                                <td>{{ $m -> varian }}</td>
                                <td>{{ $m -> nomor_plat }}</td>
                                <td>{{ $m -> merk-> nama_merk }}</td>
                                <td>{{ $m -> tarif }}</td>
                                @if(auth()->user()->level == 'admin')
                                <td>
                                    <form action="{{ route('mobil.destroy',['mobil'=>$m->id]) }}" method="POST">
                                        <a class="btn btn-info" href="{{ route('mobil.show', $m->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('mobil.edit', $m->id) }}">Edit</a>
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
                            <a class="btn btn-success" href="{{ route('mobil.create') }}"> Input Mobil</a>
                        </div>
                        @endif
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