$(document).ready(function () {
    $(".partnerContent").owlCarousel({
        loop: true,
        margin: 20,
        responsiveClass: true,
        nav: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: false,
                loop: false
            }
        }
    });

    $('.btn-add-cart').click(function () {
        let quantity=1;
        if($('select[name="ProductQuantity"]').val()) quantity=Number($('select[name="ProductQuantity"]').val());
        $.ajax({
            url: `/cart/add`,
            method: 'POST',
            data: {
                id: $(this).attr('data-id'),
                quantity: quantity
            },
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (data) {
                data = JSON.parse(data);
                updateCart(data);
            }
        });
    });
});
/*-------------end js config carsoule news macca--------------*/

$(".shoppingCart").on("click", function () {
    $(".shoppingCartContent").slideToggle();
});

/*js them bang vao mo ta*/
$(".describeContent table").wrap("<div class='table-responsive'></div>");
$(".describeContent table").addClass("table")


$('.delete-product-cart').on('click',function () {
    let id = $(this).attr('data-id');
    $.ajax({
        url: `/cart/remove`,
        method: 'POST',
        data: {
            id: id
        },
        headers:
            {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        success: function (data) {
            data=JSON.parse(data);
            updateCart(data);
        }
    });
});

function updateCart(data){
    let cartContent = $('.shoppingCartContent');
    cartContent.find('.clearfix').remove();
    cartContent.find('.totalPrice').html('');
    let cartHtml = '', totalPrice = 0;
    for(let key in data){
        let product = data[key];
        totalPrice += product.price * product['enum'];
        cartHtml +=
            `<div class="media clearfix">
                <div class="media-link pull-left">
                    <img src="${product.avatar}" alt="" class="img-responsive">
                </div>
                <div class="media-body">
                    <p class="nameProductCart"><a href="/san-pham/${product.url}" target="_blank">${product.name}</a></p>
                    <div class="infoProductCart">
                        <p class="pull-left">SL: <span class="quanityProductCart">${product['enum']}</span>x <span class="priceProductCart">${product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</span></p>
                        <p class="pull-right deleteProductCart"><a class="delete-product-cart" data-id="${product.id}" title="delete item"><i 
                        class="fa fa-trash-o"></i></a></p>
                    </div></div></div>`;
    }
    $('.toolbar-count').html(Object.keys(data).length);
    cartContent.find('.myCart').after(cartHtml);
    cartContent.find('.totalPrice').html(`${totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")} đ`);
    $('.delete-product-cart').on('click',function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: `/cart/remove`,
            method: 'POST',
            data: {
                id: id
            },
            headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            success: function (data) {
                data=JSON.parse(data);
                updateCart(data);
            }
        });
    });
}