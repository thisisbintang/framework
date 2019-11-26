@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Buat Barang Baru</div>
                    <div class="card-body">
                        <a href="{{ route('goods.index') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Kembali
                            </button>
                        </a>
                        <br/>
                        <br/>

                        <form method="POST" action="{{ route('goods.store') }}" accept-charset="UTF-8"
                              class="form-horizontal"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('goods.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
