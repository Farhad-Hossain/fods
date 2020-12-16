$("#restaurant_table").dataTable();

function set_value_and_rise_modal(id, name, status, route)
{
    $("#cuisine_modal_title").text('Edit Cuisine');
    var action = route;
    $("form").attr('action', action)
    $("input[name='id']").val(id);
    $("input[name='name']").val(name);

    $("#cuisines_modal").modal();
}

function set_value_and_rise_edit_modal(id, name, status, route) 
{
}

function clear_value_and_rise_modal()
{
    
}
