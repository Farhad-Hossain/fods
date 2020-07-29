function set_value_and_rise_edit_modal(route_address, name, email, phone_number, default_delivery_address, status)
{
	$('#edit_customer_form').attr('action', route_address);
	$('#edit_customer_form input[name="name"]').val(name);
	$('#edit_customer_form input[name="email"]').val(email);
	$('#edit_customer_form input[name="phone_number"]').val(phone_number);
	$('#edit_customer_form textarea[name="default_delivery_address"]').text(default_delivery_address);
	if( status == 1 ){
		$("#radio_edit_active_status").attr('checked', false);
		$("#radio_edit_inactive_status").attr('checked', false);
		$("#radio_edit_active_status").attr('checked', true);
	}else{
		$("#radio_edit_active_status").attr('checked', false);
		$("#radio_edit_inactive_status").attr('checked', false);
		$("#radio_edit_inactive_status").attr('checked', true);
	}
}
