function set_edit_form_value(name, route)
{
    $("#edit_form").attr('action', route);

    $("#order_status_name").val(name);
}
