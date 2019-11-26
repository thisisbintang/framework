@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Detail Data Transaksi</div>
                    <div class="card-body">

                        <a href="{{ route('transactions.index') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Kembali
                            </button>
                        </a>

                        <form method="POST" action="{{ route('transactions.destroy', $transaction->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Transaction"
                                    onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                                                                             aria-hidden="true"></i>
                                Hapus
                            </button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th> Kode Transaksi</th>
                                    <td> {{ $transaction->transactionCode }} </td>
                                </tr>
                                <tr>
                                    <th> Kode Barang</th>
                                    <td> {{ $transaction->itemCode }} </td>
                                </tr><tr>
                                    <th> Stok Keluar</th>
                                    <td> {{ $transaction->stockOut }} </td>
                                </tr><tr>
                                    <th> Total Harga (Rp.)</th>
                                    <td> {{ $transaction->totalPrice }} </td>
                                </tr>
                                <tr>
                                    <th> Transaksi Masuk</th>
                                    <td> {{ $transaction->created_at }} </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
