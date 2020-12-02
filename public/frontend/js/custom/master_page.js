function addToCart(food_id) {
    
    let extra_food = [];
    $("input[name=extra_food]").each( function () {
        if ($(this).is(':checked')) {
            extra_food.push($(this).val());
        }
    });

    let csrf_token = $("#_token").val();
    let food_quantity = $("#qty_input").val();
    let post_url = "{!! route('frontend.cart.add') !!}";
    $.ajax({
        type: "POST",
        url: post_url,
        data: {_token: csrf_token, extra_food: extra_food, food_id: food_id, food_quantity: food_quantity},
        success: function( data ) {
            // if (data.status !== 200) {
            //     $.growl.notice({ title: "Success", message: data.message });
            // } else {
            getTopCartContent();
            swal({
                text: data.message
            });
            // $.growl.notice({ title: "Success", message: "Food Added Successfully!" });
            // }
        }
    });
}
function getTopCartContent() {
    let csrf_token = $("#_token").val();
    let post_url = "{!! route('frontend.cart.getContent') !!}";
    $.ajax({
        type: "POST",
        url: post_url,
        data: {_token: csrf_token},
        success: function( data ) {
            $("#min_car_content").html(data);
        }
    });
}
function removeContent(id, extra = false) {
    let csrf_token = $("#_token").val();
    let post_url = "{!! route('frontend.cart.removeContent') !!}";
    $.ajax({
        type: "POST",
        url: post_url,
        data: {_token: csrf_token, id: id, extra: extra},
        success: function( data ) {
            getTopCartContent();
        }
    });
}

function calculateTotalAmountInFoodDetail() {
    let total_price = 0;
    $("input[name=extra_food]").each( function () {
        if ($(this).is(':checked')) {
            let ep_id = $(this).val();
            total_price += parseFloat($(".ep_"+ep_id).html());
        }
    });

    let food_quantity = parseFloat($("#qty_input").val());
    let food_price = parseFloat($(".food_price").html());
    let delivery_charge = parseFloat($(".food_delivery_charge").html());

    total_price = total_price + (food_quantity * food_price) + delivery_charge;


    $(".total-price p").html(total_price);
}

$(document).ready(function () {
    getTopCartContent();
    calculateTotalAmountInFoodDetail();
});
