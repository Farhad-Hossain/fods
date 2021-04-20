
$("#food_category_table").dataTable();

function set_value_and_rise_edit_modal(route_address, id, name, description, status)
{
	
	$('#edit_category_form').attr('action', route_address);
	$('#edit_category_form input[name="id"]').val(id);
	$('#edit_category_form input[name="name"]').val(name);
	$('#edit_category_form textarea[name="description"]').text(description);
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
