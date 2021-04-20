$('.payment_status_change_btn').click(function(){
    $('input[name="payment_order_id"]').val( $(this).attr('id') );
    $('#payment_status_modal').modal();
});
$('.status_change_btn').click(function(){
   $('input[name="order_id"]').val( $(this).attr('oid') );
   $('#status_modal').modal(); 
});
