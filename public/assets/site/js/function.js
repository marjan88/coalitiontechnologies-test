$(document).ajaxStart(function () {
    NProgress.start();
});
$(document).ajaxStop(function () {
    NProgress.done();
    NProgress.remove();
});
$(document).ready(function () {
    get_rows();
    $('#dataTable').on('click', '.action', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        delete_row(id);
    });

    $('#submit').on('click', function (e) {
        e.preventDefault();
        var formData = {
            product: $('input[name=product]').val(),
            qnt: $('input[name=qnt]').val(),
            price: $('input[name=price]').val()
        };
        $.ajax({
            type: "post",
            url: "/",
            dataType: 'json',
            data: formData,
            success: function (data) {
                $('#dataTable').empty();
                get_rows();
                $.notify(data.msg, "success");
            }
        });
    });


});

var get_rows = function () {
    $.ajax({
        type: "GET",
        url: "/xml",
        dataType: "json",
        beforeSend: function (xhr) {
            $('#dataTable').empty();
        },
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
//                product += "<td><a data-id='" + item.id + "' data-action='edit' class='btn btn-default btn-sm action' href='edit/" + item.id + "'><i class='fa fa-edit'></i></a></td>";
                product += "<td><a data-id='" + item.id + "' data-action='delete' class='btn btn-danger btn-sm action' href='delete/" + item.id + "'><i class='fa fa-trash'></i></a></td>";

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
};

var delete_row = function (id) {
    $.ajax({
        type: "get",
        url: "/delete/" + id,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.notify(data.msg, "success");
            get_rows();
        }, error: function (jqXHR, textStatus, errorThrown) {

        }
    });
};


