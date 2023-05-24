@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('admin.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="SKU">SKU</label>
            <input type="text" name="SKU" class="form-control" value="{{ $product->SKU }}" required>
        </div>
        <div class="form-group">
            <label for="TSI">TSI</label>
            <input type="text" name="TSI" class="form-control" value="{{ $product->TSI }}" required>
        </div>
        <div class="form-group">
            <label for="VENDOR">VENDOR</label>
            <input type="number" name="VENDOR" class="form-control" value="{{ $product->VENDOR }}" required>
        </div>
        <div class="form-group">
            <label for="BRAND">BRAND</label>
            <input type="text" name="BRAND" class="form-control" value="{{ $product->BRAND }}" required>
        </div>
        <div class="form-group">
            <label for="SHIPPING_TEMPLATE">SHIPPING TEMPLATE</label>
            <input type="text" name="SHIPPING_TEMPLATE" class="form-control" value="{{ $product->SHIPPING_TEMPLATE }}" required>
        </div>
        <div class="form-group">
            <label for="TEMPLATE_CODE">TEMPLATE CODE</label>
            <input type="number" name="TEMPLATE_CODE" class="form-control" value="{{ $product->TEMPLATE_CODE }}" required>
        </div>
        <div class="form-group">
            <label for="INSTOCK_LEADTIME">INSTOCK LEADTIME</label>
            <input type="text" name="INSTOCK_LEADTIME" class="form-control" value="{{ $product->INSTOCK_LEADTIME }}" required>
        </div>
        <div class="form-group">
            <label for="NOSTOCK_LEADTIME">NOSTOCK LEADTIME</label>
            <input type="text" name="NOSTOCK_LEADTIME" class="form-control" value="{{ $product->NOSTOCK_LEADTIME }}" required>
        </div>
        <div class="form-group">
            <label for="QUANTITY">QUANTITY</label>
            <input type="number" name="QUANTITY" class="form-control" value="{{ $product->QUANTITY }}" required>
        </div>
        <div class="form-group">
            <label for="OBSOLETE">OBSOLETE</label>
            <input type="text" name="OBSOLETE" class="form-control" value="{{ $product->OBSOLETE }}" required>
        </div>
        <div class="form-group">
            <label for="IS_UPDATED">IS UPDATED</label>
            <input type="text" name="IS UPDATED" class="form-control" value="{{ $product->IS_UPDATED }}" required>
        </div>
        <!-- ... add form inputs for other fields -->

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
