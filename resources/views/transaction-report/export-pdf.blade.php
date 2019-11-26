<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Transaksi PDF</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<style type="text/css">
    table tr td,
    table tr th {
        font-size: 9pt;
    }
</style>
<center>
    <h5>Laporan Transaksi</h5>
</center>

<table class='table table-bordered'>
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Transaksi</th>
        <th>Kode Barang</th>
        <th>Stok Keluar</th>
        <th>Harga Total</th>
        <th>Transaksi Masuk</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$item->transactionCode}}</td>
            <td>{{$item->itemCode}}</td>
            <td>{{$item->stockOut}}</td>
            <td>{{$item->totalPrice}}</td>
            <td>{{$item->created_at}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
