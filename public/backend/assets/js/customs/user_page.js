
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

$(".edit_user_btn").click(function(){
	id = $(this).parents('tr').find('.m_user_id').text();
	name = $(this).parents('tr').find('.m_name').text();
	email = $(this).parents('tr').find('.m_email').text();
	phone = $(this).parents('tr').find('.m_phone').text();
	designation = $(this).parents('tr').find('.m_designation').text();
	description = $(this).parents('tr').find('.m_description').text();

	$('#edit_user_form input[name="user_id"]').val(id);
	$('#edit_user_form input[name="name"]').val(name);
	$('#edit_user_form input[name="email"]').val(email);
	$('#edit_user_form input[name="phone"]').val(phone);
	$('#edit_user_form input[name="designation"]').val(designation);
	$('#edit_user_form textarea[name="description"]').val(description);
});
