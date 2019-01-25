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

    $('#createNewsForm').validate({
        rules: {
            title: 'required',
            image: {
                required: true,
                accept: "image/*"
            },
        },
        messages: {
            title: 'Tiêu đề không thể bỏ trống',
            image: {
                required: 'Chưa chọn ảnh đại diện bài viết',
                accept: 'Ảnh đại diện không đúng định dạng'
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