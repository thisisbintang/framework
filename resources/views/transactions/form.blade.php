@section('js')
    <script type="text/javascript">
        var price = 0;
        $(document).on('click', '#getItemCode', function () {
            document.getElementById('itemCode').value = $(this).attr('data-item_code');
            price = $(this).attr('data-price');
            $('#myModal').modal('hide');
        });

        $(document).ready(function () {
            $('#lookup').DataTable();

        });
        $(function () {
            $("#stockOut").keyup(function () {
                document.getElementById('totalPrice').value = price * document.getElementById('stockOut').value;
            });
        });


    </script>
@stop

<div class="form-group {{ $errors->has('transactionCode') ? 'has-error' : ''}}">
    <label for="transactionCode" class="control-label">{{ 'Kode Transaksi' }}</label>
    <input class="form-control" name="transactionCode" type="text" id="transactionCode"
           value="{{ isset($transaction->transactionCode) ? $transaction->transactionCode : $transactionCode }}"
           readonly>
    {!! $errors->first('transactionCode', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('itemCode') ? 'has-error' : ''}}">
    <label for="itemCode" class="control-label">{{ 'Kode Barang' }}</label>
    <div class="input-group">
        <input class="form-control" name="itemCode" type="number" id="itemCode"
               value="{{ isset($transaction->itemCode) ? $transaction->itemCode : ''}}" readonly="">
        <span class="input-group-btn">
            <button type="button" class="btn btn-secondary" data-toggle="modal"
                    data-target="#myModal"><strong>Cari Kode Barang</strong> <span
                    class="fa fa-search"></span>
            </button>
        </span>
    </div>
    {!! $errors->first('itemCode', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('stockOut') ? 'has-error' : ''}}">
    <label for="stockOut" class="control-label">{{ 'Stok Keluar' }}</label>
    <input class="form-control" name="stockOut" type="number" id="stockOut"
           value="{{ isset($transaction->stockOut) ? $transaction->stockOut : old('stockOut')}}">
    {!! $errors->first('stockOut', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group">
    <label for="totalPrice" class="control-label">{{ 'Total Harga (Rp.)' }}</label>
    <input class="form-control" name="totalPrice" type="number" id="totalPrice"
           value="{{ isset($transaction->totalPrice) ? $transaction->totalPrice : old('totalPrice')}}" readonly="">
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
                            Stok
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
                        <tr id="getItemCode" data-item_code="{{$data->itemCode}}" data-price="{{$data->price}}"
                            style="cursor: pointer;">
                            <td>
                                {{$data->itemCode}}
                            </td>
                            <td>
                                {{$data->stock}}
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
