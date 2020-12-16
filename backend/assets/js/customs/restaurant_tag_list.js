function set_for_edit(id, name, route)
{
    $("#tag_modal_title").text('Tag Edit');
    var action = route;
    $("form").attr('action', action)
    $("input[name='id']").val(id);
    $("input[name='name']").val(name);
}
function set_for_create()
{
    $("#tag_modal_title").text("{{ __('tags.modal_create_title') }}");
    var action = "{{ route('backend.restaurant.tags.add_submit') }}";
    $("form").attr('action', action)
    $("input[name='id']").val("");
    $("input[name='name']").val("");
}
