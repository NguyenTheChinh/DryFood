$(document).ready(function () {
    let table = $('#categoryTable').DataTable();

    $('.editCategory').click(function () {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        Swal.fire({
            title: 'Nhập tên mới cho loại sản phẩm',
            input: 'text',
            inputValue: name,
            showCancelButton: true,
            confirmButtonText: 'Cập nhật',
            cancelButtonText: 'Hủy',
            inputValidator: (value) => {
                return !value && 'Vui lòng nhập tên loại sản phẩm'
            }
        }).then((result) => {
            if (!result.value || name === result.value) return;
            $.ajax({
                url: `/admin/category/${id}`,
                data: {
                    name: result.value
                },
                method: 'PUT',
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function (response) {
                    location.reload();
                }
            });
        });
    });

    $('.deleteCategory').click(function () {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        let count = Number($(this).attr('data-count'));
        if(count){
            Swal.fire({
                type: 'error',
                text: `Loại sản phẩm này có ${count} sản phẩm, không thể xóa`,
            });
            return;
        }
        Swal.fire({
            title: `Bạn muốn xóa loại sản phẩm ${name}`,
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy',
        }).then((result) => {
            if (!result.value) return;
            $.ajax({
                url: `/admin/category/${id}`,
                method: 'DELETE',
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function (response) {
                    location.reload();
                }
            });
        });
    });

});