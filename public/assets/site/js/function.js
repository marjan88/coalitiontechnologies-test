$( document ).ajaxStart(function() {
 NProgress.start();
});
$( document ).ajaxStop(function() {
 NProgress.done();
  NProgress.remove();
});
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/xml",
        dataType: "json",
        success: function (data) {
            var product = '';
            var total = 0;
//            console.log(data);
            $.each(data, function (index, item) {
                var tp = item.qnt * item.price;
                product += '<tr>';
                product += "<td>" + item.product + "</td>";
                product += "<td>" + item.qnt + "</td>";
                product += "<td>" + item.price + "</td>";
                product += "<td>" + item.date + "</td>";
                product += "<td>" + tp.toFixed(2) + "</td>";
                product += "<td><a class='btn btn-default btn-sm' href='edit/" + item.id + "'><i class='fa fa-edit'></i></a></td>";
                product += "<td><a class='btn btn-danger btn-sm' href='delete/" + item.id + "'><i class='fa fa-trash'></i></a></td>";
                 
                product += '</tr>';
                total += Number(tp);
            });
            $('#dataTable').append(product);
            $('#dataTable').append("<tr><td></td><td></td><td></td><td></td><td></td><td>" + total.toFixed(2) + "</td></tr>");
        },
        error: function (data) {
            console.log('error');
        }
    });

    $('#submit').on('click', function (e) {
        e.preventDefault();
        var formData = {
            product: $('input[name=product]').val(),
            qnt: $('input[name=qnt]').val(),
            price: $('input[name=price]').val(),
        }
        $.ajax({
            type: "post",
            url: "/",
            dataType: 'json',
            data: formData,
            success: function (data) {

                $('#dataTable').empty();

                var product = '';
                var total = 0;

                $.each(data, function (index, item) {
                    var tp = item.qnt * item.price;
                    product += '<tr>';

                    product += "<td>" + item.product + "</td>";
                    product += "<td>" + item.qnt + "</td>";
                    product += "<td>" + item.price + "</td>";
                    product += "<td>" + item.date + "</td>";
                    product += "<td>" + tp.toFixed(2) + "</td>";
                    product += "<td><a class='btn btn-sm' href='delete/" + item.id + "'>Delete</a></td>";
                    product += '</tr>';
                    total += Number(tp);
                });
                $('#dataTable').append(product);
                $('#dataTable').append("<tr><td></td><td></td><td></td><td></td><td></td><td>" + total.toFixed(2) + "</td></tr>");
            }
        });
    });

   
});


