@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Laporan Data Stok Barang</div>
                    <div class="card-body">
                        <a href="{{route('stock-report.export-pdf')}}" class="btn btn-primary"><i
                                class="fa fa-download"></i> Cetak PDF</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
