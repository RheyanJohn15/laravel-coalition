<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>
</head>
<body>

<div class="p-4">
    <form id="productForm" class="row">
        <div class="mb-3 col-5">
            <label for="name" class="form-label">Product Name</label>
            <input required type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
        </div>

        <div class="mb-3 col-2">
        <label for="quantity" class="form-label">Quantity in Stock</label>
            <input required type="number" class="form-control" id="quantity" name="quantity" placeholder="#######">
        </div>

        <div class="mb-3 col-2">
            <label for="price" class="form-label">Price Per Item</label>
            <input required type="number" class="form-control" id="price" name="price" placeholder="$$$$$$">
        </div>  

       <div class="col-3 p-3 d-flex justify-center align-items-center">
       <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </form>
</div>


<div class="p-4 mt-4">
    <table id="productsTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Actions</th>
                    <th>Product Name</th>
                    <th>Quantity in Stock</th>
                    <th>Price per item</th>
                    <th>Date Time Submitted</th>
                    <th>Date Time Updated</th>
                    <th>Total value number</th>
                </tr>
            </thead>

            <tbody>
            </tbody>
    </table>
</div>


<div class="modal fade" id="viewProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="updateProductForm" class="row">
        <input type="hidden" name="id" id="productId">

        <div class="mb-3 col-6">
            <label for="up_name" class="form-label">Product Name</label>
            <input required type="text" class="form-control" id="up_name" name="name" placeholder="Enter Product Name">
        </div>

        <div class="mb-3 col-3">
        <label for="up_quantity" class="form-label">Quantity in Stock</label>
            <input required type="number" class="form-control" id="up_quantity" name="quantity" placeholder="#######">
        </div>

        <div class="mb-3 col-3">
            <label for="up_price" class="form-label">Price Per Item</label>
            <input required type="number" class="form-control" id="up_price" name="price" placeholder="$$$$$$">
        </div>  
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="updateProduct()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
<script src="/product-service.js"></script>
</body>
</html>