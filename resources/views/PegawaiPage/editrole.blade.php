@extends('HomePage.layout')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Merk
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
                <form method="POST" action="{{ route('role.update', $akun->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id"></label>
                        <input type="hidden" name="id" class="form-control" id="id" value="{{ $akun->id }}" readonly="readonly" aria-describedby="id">
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Orang</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $akun->name }}" aria-describedby="name">
                    </div>
                    <div class="form-group">
                        <label for="level">Role User</label>
                        <select id="level" class="form-control" name="level">
                            <option value="admin" selected>admin</option>
                            <option value="pengguna">pengguna</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-success mt-2 mb-2" href="{{ route('admin.index') }}">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection