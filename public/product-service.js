$('#productForm').on('submit', function(event) {
    event.preventDefault();

    const formData = {
        name: $('input[name="name"]').val(),
        quantity: $('input[name="quantity"]').val(),
        price: $('input[name="price"]').val()
    };

    console.log(JSON.stringify(formData));

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
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
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