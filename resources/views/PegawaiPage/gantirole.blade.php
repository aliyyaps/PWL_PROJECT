@extends('HomePage.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Akun</h3>
                    </div>

                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($akun as $p)
                            <tr>
                                @if($p->id!=auth()->id())
                                
                                {{-- <td><img width="75" height="75" src="{{ asset('storage/'.$p->foto_pegawai) }}"></td> --}}
                                <td>{{ $p -> name }}</td>
                                {{-- <td>
                                    @if($p->jenis_kelamin==0)
                                    Perempuan
                                    @else
                                    Laki-laki
                                    @endif
                                </td> --}}
                                <td>{{ $p -> email }}</td>
                                <td>{{ $p -> level }}</td>
                                {{-- <td>{{ $p -> telepon }}</td> --}}
                                <td>
                                    <form action="{{ route('pegawai.destroy',['pegawai'=>$p->id]) }}" method="POST">
                                        {{-- <a class="btn btn-info" href="{{ route('pegawai.show', $p->id_pegawai) }}">Show</a> --}}
                                        <a class="btn btn-primary" href="{{ route('role.edit', $p->id) }}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </table>
                        {{-- <div class="float-left mt-2">
                            {{ $p->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection