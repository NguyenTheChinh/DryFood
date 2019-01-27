$(document).ready(function () {
    $('#newsTable').DataTable();

    document.querySelectorAll('oembed[url]').forEach(element => {
        const anchor = document.createElement('a');
        anchor.setAttribute('href', element.getAttribute('url'));
        anchor.className = 'embedly-card';
        element.appendChild(anchor);
    });

    $('.deleteNews').click(function () {
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        Swal.fire({
            title: `Bạn muốn xóa bài viết ${name}`,
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy',
        }).then((result) => {
            if (!result.value) return;
            $.ajax({
                url: `/admin/news/${id}`,
                method: 'DELETE',
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success: function () {
                    location.reload();
                }
            });
        });
    })
});