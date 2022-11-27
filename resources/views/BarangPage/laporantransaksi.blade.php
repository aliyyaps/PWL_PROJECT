<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" c integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <title>Cetak PDF</title>
</head>

<body>
    <div class="container-fluid m-0">
        <div class="card-header border-bottom border-3 border-dark mb-2 pb-4">
            <h3 class="card-title text-center mb-1"><b>LAPORAN TRANSAKSI</b></h3>
            <p class="text-center my-0">Jl. Suhat, Malang, Jawa Timur</p>
            <p class="text-center my-0">08129871231|barang@gmail.com</p>
        </div>

        <div class="card-body">
            <h5><b>Laporan Data Penyewaan</b></h5>
            <table class="table table-bordered table-hover">
                <tr class="table-danger">
                    <th>Nama Barang</th>
                    <th>Label</th>
                    <th>Berat Barang</th>
                    <th>User Pemesan</th>
                    <th>Jumlah Dibeli</th>
                    <th>Harga Saat ini</th>
                    <th>Status Pesanan</th>
                    
                </tr>
                @foreach ($paginate as $cetak)
                <tr>
                    <td>{{ $cetak -> barang -> nama_barang }}</td>
                    <td>{{ $cetak -> label -> nama_label}}</td>
                    <td>{{ $cetak -> berat.$cetak->satuan }}</td>
                    <td>{{ $cetak -> namaorang }}</td>
                    <td>{{ $cetak -> jumlah }}</td>
                    <td>{{ $cetak -> harga }}</td>
                    <td>{{ $cetak -> status }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>