let descriptionEditor, subtitleEditor;
$(document).ready(function () {
    ClassicEditor
        .create(document.querySelector('#subtitle'), {
            language: 'vi',
            ckfinder: {
                uploadUrl: '/ckfinder/connector?command=QuickUpload&type=Images&responseType=json',
                options: {
                    resourceType: 'Images'
                }
            }
        })
        .then(editor => {
            console.log(editor);
            descriptionEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });

    ClassicEditor
        .create(document.querySelector('#description'), {
            language: 'vi',
            ckfinder: {
                uploadUrl: '/ckfinder/connector?command=QuickUpload&type=Images&responseType=json',
                options: {
                    resourceType: 'Images'
                }
            }
        })
        .then(editor => {
            console.log(editor);
            subtitleEditor = editor;
        })
        .catch(error => {
            console.error(error);
        });

    $('#createProductForm').validate({
        rules: {
            name: 'required',
            category_id: 'required',
            code: 'required',
            old_price: {
                required: true,
                number: true,
                min: 0
            },
            price: {
                required: true,
                number: true,
                min: 0
            },
            avatar: {
                required: true,
                accept: "image/*"
            },
            'image[]': {
                accept: "image/*"
            },
        },
        messages: {
            name: 'Tên sản phẩm không thể bỏ trống',
            category_id: 'Chọn loại sản phẩm',
            code: 'Mã sản phẩm không thể bỏ trống',
            old_price: {
                required: 'Giá cũ không thể bỏ trống',
                number: 'Giá cũ phải là số',
                min: 'Giá cũ phải lớn hơn hoặc bằng 0'
            },
            price: {
                required: 'Giá không thể bỏ trống',
                number: 'Giá phải là số',
                min: 'Giá phải lớn hơn hoặc bằng 0'
            },
            avatar: {
                required: 'Chưa chọn ảnh đại diện',
                accept: 'Ảnh đại diện không đúng định dạng'
            },
            'image[]': {
                accept: 'Ảnh mô tả không đúng định dạng'
            }
        }
    });

    $('.custom-file-input').on('change', function (e) {
        if (e.target.files.length) {
            let fileName;
            if (e.target.files.length === 1) {
                fileName = e.target.files[0].name;
            } else {
                fileName = `${e.target.files.length} files`;
            }
            $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
        }
    });
});