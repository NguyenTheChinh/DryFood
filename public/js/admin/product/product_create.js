$(document).ready(function () {
    let ckeditor;
    ClassicEditor
        .create(document.querySelector('#editor'), {
            language: 'vi',
            ckfinder:{
                uploadUrl: '/ckfinder/connector?command=QuickUpload&type=Images&responseType=json',
                options: {
                    resourceType: 'Images'
                }
            }
        })
        .then(editor => {
            console.log(editor);
            ckeditor = editor;
        })
        .catch(error => {
            console.error(error);
        });

    $('.deleteOrder').click(function () {

    })
});