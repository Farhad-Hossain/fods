$("#restaurant_table").dataTable();
function arise_modal_for_edit(id, name, cat, price)
{
    $("#edit_form input[name='id']").val(id);
    $("#edit_form input[name='name']").val(name);
    $("#edit_form select[name='category']").val(cat);
    $("#edit_form input[name='price']").val(price);
}