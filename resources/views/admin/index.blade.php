@extends('layouts.app')

@section('content')
    <h1>Admin Panel</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>SKU</th>
                <th>TSI</th>
                <th>VENDOR</th>
                <th>BRAND</th>
                <th>SHIPPING TEMPLATE</th>
                <th>TEMPLATE CODE</th>
                <th>INSTOCK LEADTIME</th>
                <th>NOSTOCK LEADTIME</th>
                <th>QUANTITY</th>
                <th>OBSOLETE</th>
                <th>IS UPDATED</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->SKU }}</td>
                    <td>{{ $product->TSI }}</td>
                    <td>{{ $product->VENDOR }}</td>
                    <td>{{ $product->BRAND }}</td>
                    <td>{{ $product->SHIPPING_TEMPLATE }}</td>
                    <td>{{ $product->TEMPLATE_CODE }}</td>
                    <td>{{ $product->INSTOCK_LEADTIME }}</td>
                    <td>{{ $product->NOSTOCK_LEADTIME }}</td>
                    <td>{{ $product->QUANTITY }}</td>
                    <td>{{ $product->OBSOLETE }}</td>
                    <td>{{ $product->IS_UPDATED }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you\'re deleting?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.create') }}" class="btn btn-success">Add Product</a>

    <form action="{{ route('admin.upload') }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @csrf
        <div class="form-group">
            <label for="csv_file">CSV File</label>
            <input type="file" name="csv_file" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Upload CSV</button>
    </form>

    <a href="{{ route('admin.export') }}" class="btn btn-secondary mt-4">Export to CSV</a>
@endsection
