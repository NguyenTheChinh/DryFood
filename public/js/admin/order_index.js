$(document).ready(function () {
    let table = $('#orderTable').DataTable({
        columns: [
            {
                "className": 'details-control',
                "orderable": false,
                "data": null,
                "defaultContent": ''
            },
            {data: 'code'},
            {data: 'customer_name'},
            {data: 'customer_email'},
            {data: 'customer_phone'},
            {data: 'customer_address'},
            {data: 'payment_method'},
            {data: 'price'},
            {data: 'notes'},
            {data: 'status'},
            {data: 'action'},
            {data: 'products'},
        ]
    });

    $('#orderTable tbody').on('click', 'td.details-control', function () {
        let tr = $(this).closest('tr');
        let row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            tr.removeClass('table-success');
        } else {
            console.log(row.data());
            // Open this row
            row.child(`<table class="table-borderless" cellpadding="5" cellspacing="0" border="0" 
style="padding-left:50px;"><tr><td>Email 
khách hàng:</td><td>${row.data().customer_email}</td></tr><tr><td>Ghi chú:</td><td>${row.data().notes}</td></tr><tr><td>Danh sách 
sản phẩm:</td><td style="padding: 0">${row.data().products}</td></tr></table>`).show();
            tr.addClass('table-success');
            tr.addClass('shown');
        }
    });

    $('.deleteOrder').click(function () {

    })
});