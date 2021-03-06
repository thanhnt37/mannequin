$('.datetime-field').datetimepicker({'format': 'YYYY-MM-DD', 'defaultDate': new Date()});

var currentOptionQuantity = [];

$(document).ready(function () {
    $('#avatar-image').change(function (event) {
        $('#avatar-image-preview').attr('src', URL.createObjectURL(event.target.files[0]));
    });

    $(".employee-id").select2({
        placeholder: "Select Employee",
        allowClear: true
    }).val(Boilerplate.employeeId).trigger("change");

    $('select[name="modal_product_name"]').on('change', function () {
        generateOptions();
        generateUnit();
    });

    $('select[name="modal_product_option"]').on('change', function () {
        $('#modal-export-price').val($('#modal-product-option option:selected').attr('p'));
        $('#modal-current-quantity').text(currentOptionQuantity[$('#modal-product-option option:selected').attr('value')] + ' -');
        $('#modal-current-quantity').attr('value', currentOptionQuantity[$('#modal-product-option option:selected').attr('value')]);
        generateUnit();
    });

    var index = 0;
    $('#modal-save').on('click', function () {
        productId           = $('#modal-product-name').val();
        option              = $('#modal-product-option').val();
        price               = $('#modal-export-price').val();
        quantity            = $('#modal-quantity').val();
        currentQuantity     = parseInt($('#modal-current-quantity').attr('value'));
        unit                = $('#modal-unit').val();
        unitExchange        = $('#modal-unit :selected').attr('exchange');
        if( productId && option && quantity > 0 && (currentQuantity >= quantity) ) {
            var content = '';
            content += '' +
                '<tr>' +
                    '<td>' +
                        $('#modal-product-name :selected').text() +
                        '<input type="hidden" name="products[' + index + '][id]" value=' + "'" + productId + "'" + '>' +
                    '</td>' +

                    '<td>' +
                        $('#modal-product-option :selected').text() +
                        '<input type="hidden" name="products[' + index + '][option_id]" value=' + "'" + option + "'" + '>' +
                    '</td>' +

                    '<td>' +
                        $('#modal-export-price').val() + '<span style="font-size: 11px;"> VND/' + $('#modal-unit').find("option:first-child").text() + '</span>' +
                        '<input type="hidden" name="products[' + index + '][export_price]" value=' + "'" + price + "'" + '>' +
                    '</td>' +

                    '<td>' +
                        quantity +
                        '<input type="hidden" name="products[' + index + '][quantity]" value=' + "'" + quantity + "'" + '>' +
                    '</td>' +

                    '<td>' +
                        $('#modal-unit :selected').text() +
                        '<input type="hidden" name="products[' + index + '][unit_id]" value=' + "'" + unit + "'" + '>' +
                        '<input type="hidden" name="products[' + index + '][unit_exchange]" value=' + "'" + unitExchange + "'" + '>' +
                    '</td>' +

                    '<td>' +
                        quantity * unitExchange * price + ' <span style="font-size: 11px;">VND</span>' +
                    '</td>' +

                    '<td style="text-align: center">' +
                        '<span onclick="deleteProduct(this);" style="cursor: pointer; color: #ca2424;"> Delete</span>' +
                    '</td>' +
                '</tr>';
            $('#export-products').append(content);
            currentOptionQuantity[$('#modal-product-option option:selected').attr('value')] -= quantity * unitExchange;
        } else {
            alert('Error, Parameter is invalid !!!');
        }

        index++;
        $('.close').click();
    });

    $('#modal-unit').on('change', function () {
        currentQuantity = currentOptionQuantity[$('#modal-product-option option:selected').attr('value')];
        unitExchange = $('#modal-unit :selected').attr('exchange');
        quantityExchange = (currentQuantity - (currentQuantity%unitExchange)) / unitExchange;

        $('#modal-current-quantity').attr('value', quantityExchange);
        $('#modal-current-quantity').text(quantityExchange + ' -');
    });
});

function generateOptions() {
    optionUrl = $('#modal-product-name option:selected').attr('option-url');

    $('select[name="modal_product_option"]').html('');

    $.ajax({
        type: 'GET',
        url: optionUrl,
        data: {
        },
        success: function (response) {
            if( response.code == 100 ) {
                response.data.forEach(function (option, index) {
                    $('select[name="modal_product_option"]').append('<option value="' + option.id + '" p="' + option.export_price + '" q="' + option.quantity + '">' + option.name + '</option>');
                    if( typeof(currentOptionQuantity[option.id]) == "undefined" ) {
                        currentOptionQuantity[option.id] = option.quantity;
                    }
                });

                $('#modal-export-price').val($('#modal-product-option option:selected').attr('p'));
                $('#modal-current-quantity').text(currentOptionQuantity[$('#modal-product-option option:selected').attr('value')] + ' -');
                $('#modal-current-quantity').attr('value', currentOptionQuantity[$('#modal-product-option option:selected').attr('value')]);
            } else {
                alert(response.message);
            }
        },
        error: function () {

        }
    });

}

function generateUnit() {
    productId = $('#modal-product-name').val();

    Boilerplate.products.forEach(function (product) {
        if (product.id == productId) {
            $('#modal-unit').html('');
            $('#modal-unit').append('<option value="' + product.unit_id + '" exchange="1">' + product.unit_name + '</option>');
            if( product.unit2_id ) {
                $('#modal-unit').append('<option value="' + product.unit2_id + '" exchange="' + product.unit_exchange + '">' + product.unit2_name + ' (' + product.unit_exchange + ' ' + product.unit_name + ')</option>');
            }
        }
    });
}

function resetModalExport() {
    $('#modal-product-name').val('');
    $('#modal-product-option').html('');
    $('#modal-product-option').append('<option value="">Select a Option</option>');
    $('#modal-export-price').val(0);
    $('#modal-quantity').val(0);
    $('#modal-current-quantity').text('0 -');
}

function deleteProduct(span) {
    if (confirm('Are You Sure ?')) {
        $(span).parent().parent().remove();
    }
}

function createNewCustomer() {
    data = {
        _token: Boilerplate.csrfToken,
        name: $('#modal-customer-name').val(),
        telephone: $('#modal-customer-telephone').val(),
        province_id: $('#modal-customer-province_id').val(),
        district_id: $('#modal-customer-district_id').val(),
        address: $('#modal-customer-address').val()
    };

    $.ajax({
        type: 'POST',
        url: $('#modal-form-customers').attr('action'),
        data: data,
        success: function (response) {
            if( response.code == 100 ) {
                customer = response.data;
                $('#customer-id').append('<option value="' + customer.id + '">' + customer.name + '</option>');
            } else {
                alert(response.message);
            }
        },
        error: function () {

        }
    });

    $('.close').click();
    return false;
}

function resetModalCustomer() {
    $('#modal-customer-name').val('');
    $('#modal-customer-telephone').val('');
    $('#modal-customer-province_id').val('');
    $('#modal-customer-district_id').val('');
    $('#modal-customer-address').val('');
}