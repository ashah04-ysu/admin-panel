@extends('layouts.app')

@section('content')
    <h1>Add Product</h1>

    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="SKU">SKU</label>
            <input type="text" name="SKU" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="TSI">TSI</label>
            <input type="text" name="TSI" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="VENDOR">VENDOR</label>
            <input type="number" name="VENDOR" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="BRAND">BRAND</label>
            <input type="text" name="BRAND" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="SHIPPING_TEMPLATE">SHIPPING TEMPLATE</label>
            <input type="text" name="SHIPPING_TEMPLATE" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="TEMPLATE_CODE">TEMPLATE CODE</label>
            <input type="number" name="TEMPLATE_CODE" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="INSTOCK_LEADTIME">INSTOCK LEADTIME</label>
            <input type="text" name="INSTOCK_LEADTIME" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="NOSTOCK_LEADTIME">NOSTOCK LEADTIME</label>
            <input type="text" name="NOSTOCK_LEADTIME" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="QUANTITY">QUANTITY</label>
            <input type="number" name="QUANTITY" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="OBSOLETE">OBSOLETE</label>
            <input type="text" name="OBSOLETE" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="IS_UPDATED">IS UPDATED</label>
            <input type="text" name="IS UPDATED" class="form-control" required>
        </div>
        <!-- ... add form inputs for other fields -->

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
@endsection
