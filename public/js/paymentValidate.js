$.getJSON("hanhchinh.json", function (selectdata) {
    let provincial_options = [];

    for (let provincial_code in selectdata) {
        let provincial_name = selectdata[provincial_code].name;
        let option = new Option(provincial_name, provincial_code);
        provincial_options.push(option);
    }

    provincial_options.sort((key1, key2) => Number(key1.value) - Number(key2.value));
    $("#first").append(provincial_options);

    $("#first").on("change", function () {
        let selectedDistrict = selectdata[$(this).val()]["quan-huyen"]
        let district_option = [];
        for (let district_code in selectedDistrict) {
            let option = new Option(selectedDistrict[district_code].name, district_code);
            district_option.push(option);
        }
        district_option.sort((key1, key2) => Number(key1.value) - Number(key2.value));
        $("#second option[value]").remove();
        $("#second").append(district_option).val("").trigger("change");
    });
    $("#first").trigger('change');
});

$(document).ready(function () {
    $('#paymentForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            phoneNumber: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 14
            },
            city: 'required',
            district: 'required',
            infoDetailAddress: {
                required: true,
                minlength: 3
            },
            optradio: 'required'
        },
        messages: {
            name: {
                required: 'Vui lòng nhập họ và tên',
                minlength: 'Họ tên phải từ 3 kí tự trở lên'
            },
            email: {
                required: 'Vui lòng nhập email',
                email: 'Địa chỉ email nhập dạng có @'
            },
            phoneNumber: {
                required: 'Vui lòng nhập điện thoại',
                number: 'Vui lòng nhập số',
                minlength: 'Số điện thoải phải có ít nhất 10 số',
                maxlength: 'Số điện thoại không thể có 14 số'
            },
            city: 'Vui lòng chọn tỉnh/thành phố',
            district: 'Vui lòng chọn quận/huyện',
            infoDetailAddress: {
                required: 'Vui lòng nhập địa chỉ nhận hàng',
                minlength: 'Địa chỉ phải có ít nhất 3 kí tự'
            },
            optradio: 'Vui lòng chọn phương thức thanh toán'
        }
    });
});