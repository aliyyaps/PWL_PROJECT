@extends('HomePage.layout')
@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Label</h3>
                    </div>

                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <tr>
                                <th>Nama Label</th>
                                <th>Deskripsi Label</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($label as $d)
                            <tr>

                                <td>{{ $d -> nama_label }}</td>
                                <td>{{ $d -> deskripsi }}</td>
                                <td>
                                    {{-- <form action="{{ route('label.destroy',['label'=>$d->id]) }}" method="POST"> --}}
                                        <a class="btn btn-info" href="{{ route('label.show', $d->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('label.edit', $d->id) }}">Edit</a>
                                        @csrf
                                        {{-- @method('DELETE') --}}
                                        {{-- <button type="submit" class="btn btn-danger">Delete</button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <div class="float-right mt-2">
                            <a class="btn btn-success" href="{{ route('label.create') }}"> Input Label</a>
                        </div>
                        <div class="float-left mt-2">
                            {{ $label->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection