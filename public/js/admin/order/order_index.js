$(document).ready(function () {
    let table = $('#orderTable').DataTable({
        buttons: [
            {
                text: 'My button',
                action: function (e, dt, node, config) {
                    alert('Button activated');
                }
            }
        ],
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
            {data: 'created_at'},
            {data: 'updated_at'}
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
            row.child(`<table class="table-borderless table-responsive" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;"><tr><td>Email khách hàng:</td><td>${row.data().customer_email}</td></tr><tr><td>Ghi chú:</td><td style="max-width:100vh; overflow-wrap: break-word;">${row.data().notes}</td></tr><tr><td>Danh sách sản phẩm:</td><td style="padding: 0">${row.data().products}</td></tr><tr><td>Ngày tạo đơn hàng</td><td>${row.data().created_at}</td></tr><tr><td>Ngày cập nhật đơn hàng</td><td>${row.data().updated_at}</td></tr></table>`).show();
            tr.addClass('table-success');
            tr.addClass('shown');
        }
    });

    $('.changeStatus').click(function () {
        let id = $(this).attr('data-id');
        let statusTd = $(this).closest('td').siblings('.status');
        let btn = $(this);
        btn.prop('disabled', true);
        $.ajax({
            url: `/admin/order/${id}`,
            method: 'PUT',
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (data) {
                btn.prop('disabled', false);
                if (data.success) {
                    toastr.success('Cập nhật trạng thái đơn hàng thành công');
                    if (data.status === 0) {
                        statusTd.html('<span class="badge badge-warning">Chưa Xong</span>');
                    } else {
                        statusTd.html(`<span class="badge badge-success">Đã Xong</span>`);
                    }
                } else {
                    toastr.error('Cập nhật trạng thái đơn hàng thất bại');
                }
            },
            error: function(){
                btn.prop('disabled', false);
            }
        });
    })
});