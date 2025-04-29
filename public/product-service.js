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
            console.log('Success:', response);
        },
        error: function(xhr) {
            console.error('Error:', xhr.responseText);
        }
    });
});