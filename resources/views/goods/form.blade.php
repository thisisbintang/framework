<div class="form-group {{ $errors->has('itemCode') ? 'has-error' : ''}}">
    <label for="itemCode" class="control-label">{{ 'Kode Barang' }}</label>
    <input class="form-control" name="itemCode" type="number" id="itemCode"
           value="{{ isset($good->itemCode) ? $good->itemCode : old('itemCode')}}">
    {!! $errors->first('itemCode', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'Merk' }}</label>
    <input class="form-control" name="brand" type="text" id="brand"
           value="{{ isset($good->brand) ? $good->brand : old('brand')}}">
    {!! $errors->first('brand', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('color') ? 'has-error' : ''}}">
    <label for="color" class="control-label">{{ 'Warna' }}</label>
    <input class="form-control" name="color" type="text" id="color"
           value="{{ isset($good->color) ? $good->color : old('color')}}">
    {!! $errors->first('color', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="control-label">{{ 'Ukuran' }}</label>
    <input class="form-control" name="size" type="number" id="size"
           value="{{ isset($good->size) ? $good->size : old('size')}}">
    {!! $errors->first('size', '<small class="text-danger">:message</small>') !!}
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Harga (Rp.)' }}</label>
    <input class="form-control" name="price" type="number" id="price"
           value="{{ isset($good->price) ? $good->price : old('price')}}">
    {!! $errors->first('price', '<small class="text-danger">:message</small>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Ubah' : 'Buat' }}">
</div>
