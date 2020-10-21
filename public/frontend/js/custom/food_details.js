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

    $(".favourite_btn").click(function(){
        ajaxUrl = $(this).attr('ajaxUrl') ;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if ( ajaxUrl == '0' ){
            alert('Need to Login first.Thank you.');
        } else {
            $.ajax({
               type:'GET',
               url: ajaxUrl,

               success:function(data){
                    if ( data == 'data_inserted' ) {
                        $('.favourite_btn_text').text('Added to favourite');
                    } else if (data = 'data_removed') {
                        $('.favourite_btn_text').text('Add to favourite');
                    }
               }
            });
        }
    });
});
function setRating(star_count)
{
    $("input[name='star_count']").val(star_count);
}

