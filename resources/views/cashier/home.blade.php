@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            @include('layouts.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Dashboard Kasir</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Anda telah masuk!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
