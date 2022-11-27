<form method="POST" action="{{ route('transaksi.update',$transaksi->id) }}" enctype="multipart/form-data" class="p-3">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="image">Gambar Barang</label>
        <input type="file" class="form-control" required="required" name="image">
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
