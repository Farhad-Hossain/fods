$(document).ready(function () {
    $('#qty_input').prop('disabled', true);
    $('#plus-btn').click(function () {
        $('#qty_input').val(parseInt($('#qty_input').val()) + 1);
        calculateTotalAmountInFoodDetail();
    });
    $('#minus-btn').click(function () {
        $('#qty_input').val(parseInt($('#qty_input').val()) - 1);
        if ($('#qty_input').val() == 0) {
            $('#qty_input').val(1);
        }

        calculateTotalAmountInFoodDetail();
    });
});
function setRating(star_count)
{
    $("input[name='star_count']").val(star_count);
}

