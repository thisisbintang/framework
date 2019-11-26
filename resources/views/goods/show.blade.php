@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Detail Data Barang</div>
                    <div class="card-body">

                        <a href="{{ route('goods.index') }}" title="Back">
                            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                                Kembali
                            </button>
                        </a>
                        <a href="{{ route('goods.edit', $good->id) }}" title="Edit Good">
                            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> Ubah
                            </button>
                        </a>

                        <form method="POST" action="{{ route('goods.destroy', $good->id) }}" accept-charset="UTF-8"
                              style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Good"
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
                                    <th> Kode Barang</th>
                                    <td> {{ $good->itemCode }} </td>
                                </tr>
                                <tr>
                                    <th> Merk</th>
                                    <td> {{ $good->brand }} </td>
                                </tr>
                                <tr>
                                    <th> Warna</th>
                                    <td> {{ $good->color }} </td>
                                </tr>
                                <tr>
                                    <th> Ukuran</th>
                                    <td> {{ $good->size }} </td>
                                </tr>
                                <tr>
                                    <th> Harga</th>
                                    <td> Rp. {{ $good->price }} </td>
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
