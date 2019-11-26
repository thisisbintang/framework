@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Data Barang</div>
                    <div class="card-body">
                        <a href="{{ route('goods.create') }}" class="btn btn-success btn-sm" title="Add New Good">
                            <i class="fa fa-plus" aria-hidden="true"></i> Tambah Baru
                        </a>

                        <form method="GET" action="{{ route('goods.index') }}" accept-charset="UTF-8"
                              class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..."
                                       value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode Barang</th>
                                    <th>Stok</th>
                                    <th>Merk</th>
                                    <th>Warna</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($goods as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->itemCode }}</td>
                                        <td></td>
                                        <td>{{ $item->brand }}</td>
                                        <td>{{ $item->color }}</td>
                                        <td>
                                            <a href="{{ route('goods.show', $item->id) }}" title="View Good">
                                                <button class="btn btn-light btn-sm"><i class="fa fa-eye"
                                                                                       aria-hidden="true"></i> Lihat
                                                </button>
                                            </a>
                                            <a href="{{  route('goods.edit', $item->id) }}" title="Edit Good">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                                          aria-hidden="true"></i> Ubah
                                                </button>
                                            </a>

                                            <form method="POST" action="{{  route('goods.destroy', $item->id) }}"
                                                  accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Good"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div
                                class="pagination-wrapper"> {!! $goods->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
