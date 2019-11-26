@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Laporan Transaksi</div>
                    <div class="card-body">
                        <form method="GET" href="{{route('transaction-report.export-pdf')}}">
                            <button type="submit" class="btn btn-outline-primary">Cetak PDF
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
