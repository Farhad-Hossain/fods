var obj = {};
obj.cus_name = $('#customer_name').val();
obj.cus_phone = $('#mobile').val();
obj.cus_email = $('#email').val();
obj.cus_addr1 = $('#address').val();
obj.amount = $('#total_amount').val();

function calculateAndChange(subTotal, total_bill,  route_url)
{
    promocode = $("#promocode_field").val();
    total_bill = total_bill;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // route_url = ''+route_url+'/'+promocode;

    $.ajax({
       type:'GET',
       url: route_url,
       data: { _token:'{{ csrf_token() }}', promocode: promocode, subTotalBill: subTotal },

       success:function(data){
         console.log(data);
         if ( data == 'not_found' ) {
            swal("Invalid Promo", "Please enter a valid promo code", "error");
         }

         promo_code = data['promocode'][0];
         promo_code_text = promo_code.promo_code;
         total_discount_price = 0;

         if ( promo_code.promo_type == 1 ) {
            total_discount_price = parseFloat( promo_code.discount_price );
         } else {
            aux = parseFloat( promo_code.discount_price ); 
            total_discount_price = ( aux * subTotal ) / 100;
            $("#promocode_text_percentage").text( ' - '+aux+'%' );
         }
         updated_bill = parseFloat(total_bill)-parseFloat(total_discount_price);
         $("#promocode_text").text(promo_code.promo_code);
         $("#promocode_value").text(total_discount_price);
         $("#promocode_row").removeClass('d-none');
         $("#total_bill").text(updated_bill);

         swal("Promo code applied successfully.");
       }
    });
}

function OldcalculateAndChange(total_bill)
{
    promocode_field = $("#promocode_field").val();
    promocode_text = $("#promocode_text").text();
    promocode_value = $("#promocode_value").text();


    if (promocode_text == promocode_field) {
        updated_bill = parseFloat(total_bill)-parseFloat(promocode_value);
        $("#total_bill").text(updated_bill);
        alert('Promo code applied.');
    } else {
        alert('Please enter valid promo code.');
    }
}

function removeContent(content_id)
{
    alert('I am here');
}

$('#sslczPayBtn').prop('postdata', obj);

(function (window, document) {
    var loader = function () {
        var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
        // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
        script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
        tag.parentNode.insertBefore(script, tag);
    };

    window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
})(window, document);
