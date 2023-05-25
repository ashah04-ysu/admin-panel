@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>API Simulator</h1>
        <hr>

        <h3>GET - /getall</h3>
        <button class="btn btn-primary" onclick="getAll()">Get All Products</button>
        <pre id="getall-result"></pre>

        <h3>GET - /getbydate</h3>
        <form id="getbydate-form">
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <button type="submit" class="btn btn-primary">Get Products by Date</button>
        </form>
        <pre id="getbydate-result"></pre>

        <h3>POST - /add</h3>
        <form id="add-form">
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
            <input type="text" name="IS_UPDATED" class="form-control" required>
        </div>
            <!-- Add form fields for other attributes -->
            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
        <pre id="add-result"></pre>

        <h3>PUT - /update</h3>
        <form id="update-form">
            <div class="form-group">
                <label for="update-sku">SKU:</label>
                <input type="text" class="form-control" id="update-sku" name="SKU" required>
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
                <input type="text" name="IS_UPDATED" class="form-control" required>
            </div>
            <!-- Add form fields for other attributes -->
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
        <pre id="update-result"></pre>

        <h3>DELETE - /delete</h3>
        <form id="delete-form">
            <div class="form-group">
                <label for="delete-sku">SKU:</label>
                <input type="text" class="form-control" id="delete-sku" name="SKU" required>
            </div>
            <button type="submit" class="btn btn-danger">Delete Product</button>
        </form>
        <pre id="delete-result"></pre>
    </div>

    <script>
        function getAll() {
            fetch('/getall')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('getall-result').textContent = JSON.stringify(data, null, 2);
                });
        }

        document.getElementById('getbydate-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const date = document.getElementById('date').value;
            fetch(`/getbydate?date=${date}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('getbydate-result').textContent = JSON.stringify(data, null, 2);
                });
        });

        document.getElementById('add-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const form = document.getElementById('add-form');
            const formData = new FormData(form);

            fetch('/add', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('add-result').textContent = JSON.stringify(data, null, 2);
                });
        });

        document.getElementById('update-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const sku = document.getElementById('update-sku').value;
            const formData = new FormData(document.getElementById('update-form'));

            fetch('/update', {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.fromEntries(formData)),
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('update-result').textContent = JSON.stringify(data, null, 2);
                });
        });

        document.getElementById('delete-form').addEventListener('submit', function (event) {
            event.preventDefault();

            const sku = document.getElementById('delete-sku').value;
            fetch(`/delete?SKU=${sku}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json',
                },
            })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('delete-result').textContent = JSON.stringify(data, null, 2);
                })
                .catch(error => {
                    console.log(error);
                    // Handle the error appropriately
                });
        });
    </script>
@endsection
