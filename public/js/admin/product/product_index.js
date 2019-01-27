$(document).ready(function () {
    $('#productTable').DataTable();

    $('.deleteProduct').click(function () {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        Swal.fire({
            title: `Bạn muốn xóa sản phẩm ${name}`,
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy',
        }).then((result) => {
            if (!result.value) return;
            $.ajax({
                url     : `/admin/product/${id}`,
                method  : 'DELETE',
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success : function(){
                    location.reload();
                }
            });
        });
    });
});