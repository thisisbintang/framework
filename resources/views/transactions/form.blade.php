<div class="form-group {{ $errors->has('transactionCode') ? 'has-error' : ''}}">
    <label for="transactionCode" class="control-label">{{ 'Transactioncode' }}</label>
    <input class="form-control" name="transactionCode" type="number" id="transactionCode"
           value="{{ $transactionCode }}" readonly>
    {!! $errors->first('transactionCode', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('itemCode') ? 'has-error' : ''}}">
    <label for="stockOut" class="control-label">{{ 'Stockout' }}</label>
    <input class="form-control" name="stockOut" type="number" id="stockOut"
           value="{{ isset($transaction->itemCode) ? $transaction->itemCode : old('itemCode')}}">
    {!! $errors->first('stockOut', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('stockOut') ? 'has-error' : ''}}">
    <label for="stockOut" class="control-label">{{ 'Stockout' }}</label>
    <input class="form-control" name="stockOut" type="number" id="stockOut"
           value="{{ isset($transaction->stockOut) ? $transaction->stockOut : old('stockOut')}}">
    {!! $errors->first('stockOut', '<small class="text-danger">:message</small>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
