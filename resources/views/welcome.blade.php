<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" />
</head>
<body>

<div class="p-4">
    <div class="row">
        <div class="mb-3 col-5">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Product Name">
        </div>

        <div class="mb-3 col-2">
        <label for="quantity" class="form-label">Quantity in Stock</label>
            <input type="number" class="form-control" id="quantity" placeholder="#######">
        </div>

        <div class="mb-3 col-2">
            <label for="price" class="form-label">Price Per Item</label>
            <input type="number" class="form-control" id="price" placeholder="$$$$$$">
        </div>  

       <div class="col-3 p-3 d-flex justify-center align-items-center">
       <button type="button" class="btn btn-primary w-100">Submit</button>
        </div>
    </div>
</div>


<div class="p-4 mt-4">
    <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Actions</th>
                    <th>Product Name</th>
                    <th>Quantity in Stock</th>
                    <th>Price per item</th>
                    <th>Date Time Submitted</th>
                    <th>Total value number</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Actions</td>
                    <td>Product Name</td>
                    <td>Quantity in Stock</td>
                    <td>Price per item</td>
                    <td>Date Time Submitted</td>
                    <td>Total value number</td>
                </tr>
            </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>