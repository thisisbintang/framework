@section('js')
    <script type="text/javascript">

        $(document).on('click', '#getItemCode', function () {
            document.getElementById('itemCode').value = $(this).attr('data-item_code');
            $('#myModal').modal('hide');
        });

        $(document).ready(function () {
            $('#lookup').DataTable();
        });

    </script>
@stop

<div class="form-group {{ $errors->has('itemCode') ? 'has-error' : ''}}">
    <label for="itemCode" class="control-label">{{ 'Kode Barang' }}</label>
    <div class="input-group">
        <input class="form-control" name="itemCode" type="number" id="itemCode"
               value="{{ isset($stock->itemCode) ? $stock->itemCode : ''}}" readonly="">
        <span class="input-group-btn">
            <button type="button" class="btn btn-secondary" data-toggle="modal"
                    data-target="#myModal"><strong>Cari Kode Barang</strong> <span
                    class="fa fa-search"></span>
            </button>
        </span>
    </div>
    {!! $errors->first('itemCode', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('stockEntry') ? 'has-error' : ''}}">
    <label for="stockEntry" class="control-label">{{ 'Stok Masuk' }}</label>
    <input class="form-control" name="stockEntry" type="number" id="stockEntry"
           value="{{ isset($stock->stockEntry) ? $stock->stockEntry : ''}}">
    {!! $errors->first('stockEntry', '<small class="text-danger">:message</small>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Ubah' : 'Buat' }}">
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>
                            Kode Barang
                        </th>
                        <th>
                            Merk
                        </th>
                        <th>
                            Warna
                        </th>
                        <th>
                            Ukuran
                        </th>
                        <th>
                            Harga (Rp.)
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($goods as $data)
                        <tr id="getItemCode" data-item_code="{{$data->itemCode}}" style="cursor: pointer;">
                            <td>
                                {{$data->itemCode}}
                            </td>
                            <td>
                                {{$data->brand}}
                            </td>
                            <td>
                                {{$data->color}}
                            </td>
                            <td>
                                {{$data->size}}
                            </td>
                            <td>
                                {{$data->price}}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
