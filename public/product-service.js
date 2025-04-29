$('#productForm').on('submit', function(event) {
    event.preventDefault();

    const formData = {
        name: $('input[name="name"]').val(),
        quantity: $('input[name="quantity"]').val(),
        price: $('input[name="price"]').val()
    };

    $.ajax({
        url: '/api/product/create',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(formData),  
        success: function(response) {
            alertify.notify(response.message, 'success', 5 );
            productList();
        },
        error: function(xhr) {
            console.error('Error:', xhr.responseText);
        }
    });
});

function productList() {    
    if ($.fn.dataTable.isDataTable('#productsTable')) {
        $('#productsTable').DataTable().clear().destroy();
    }
    $('#productsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/api/product/list',
            type: 'GET',
            dataSrc: function (json) {
                return json.products;
            }
        },
        columns: [
            { title: "Action", data: null,
                render: function(row) {
                    return `<div class="d-flex gap-2">
                    <button data-bs-toggle="modal" data-bs-target="#viewProduct" onclick="viewProduct(
                    '${row.id}',
                    '${row.price}',
                    '${row.quantity}',
                    '${row.product_name}'
                    )" class="btn btn-primary">Edit</button>
                    <button onclick="deleteProduct('${row.id}')" class="btn btn-danger">Delete</button>
                    </div>`;
                }
            },
            { title: "Product Name", data: 'product_name' },
            { title: "Quantity in Stock", data: 'quantity' },
            { title: "Price per item", data: 'price' },
            { title: "Date Time Submitted", data: 'created_at' },
            { title: "Date Time Updated", data: 'updated_at' },
            { title: "Total value number", data: null, 
                render: function(row) {
                    return row.quantity * row.price;
                }
            },
        ],
        error: function(xhr, error, code) {
            console.error('Error fetching data:', error);
        }
    });
}

$(document).ready(function() {
    productList();
});

function deleteProduct(productId) {
    alertify.confirm('Delete Product', 'Are you sure you want to delete this product?', 
        function() { 
            $.ajax({
                url: `/api/product/delete/${productId}`,
                type: 'DELETE',
                success: function(response) {
                    alertify.success('Product deleted successfully');
                    productList();
                },
                error: function(xhr, status, error) {
                    alertify.error('Error deleting product');
                }
            });
        }, 
        function() { 
            alertify.message('Product deletion canceled');
        }
    ).set('labels', {ok: 'Yes', cancel: 'No'}); 
}

function viewProduct(id, price, quantity, name){
    document.getElementById('up_name').value = name;
    document.getElementById('up_quantity').value = quantity;
    document.getElementById('productId').value = id;
    document.getElementById('up_price').value = price;
}

function updateProduct() {
    
    const formData = {
        name: $('#up_name').val(),
        quantity: $('#up_quantity').val(),
        price: $('#up_price').val(),
        id: $('#productId').val(),
    };


    $.ajax({
        url: '/api/product/update',  
        type: 'PUT',  
        contentType: 'application/json',
        data: JSON.stringify(formData),  
        success: function(response) {
            alertify.success('Product updated successfully!');
            productList();
            $('#viewProduct').modal('hide');
        },
        error: function(xhr, status, error) {
            alertify.error('Error updating product');
        }
    });
}