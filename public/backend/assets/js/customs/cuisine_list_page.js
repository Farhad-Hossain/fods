$("#restaurant_table").dataTable();

function set_value_and_rise_modal(id, name)
{
	
    $("#cuisine_modal_title").text('Edit Cuisine');
    var action = "{{ route('backend.food.cuisines.edit_submit') }}";
    $("form").attr('action', action)
    $("input[name='id']").val(id);
    $("input[name='name']").val(name);
}
function clear_value_and_rise_modal()
{
    $("#cuisine_modal_title").text("Create Cuisine");
    var action = "{{ route('backend.food.cuisines.add_submit') }}";
    $("form").attr('action', action)
    $("input[name='name']").val("");   
}