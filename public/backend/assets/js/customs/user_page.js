
$("#user_table").dataTable();

function set_value_and_rise_edit_modal(route_address, name, email, status)
{
	$('#edit_user_form').attr('action', route_address);
	$('#edit_user_form input[name="name"]').val(name);
	$('#edit_user_form input[name="email"]').val(email);
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