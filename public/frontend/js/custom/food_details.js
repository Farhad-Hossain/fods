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
            swal({
                text: "Please, Login and try again !"
            });
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

function addOne (extra_food_id, price) 
{   
    $(".ef_qty_"+extra_food_id).val ( parseInt($(".ef_qty_"+extra_food_id).val()) + 1 );
    updateExtraFoodPrice(extra_food_id, price)
}
function minusOne (extra_food_id, price) 
{
    $(".ef_qty_"+extra_food_id).val ( parseInt($(".ef_qty_"+extra_food_id).val()) - 1 );
    updateExtraFoodPrice(extra_food_id, price)
}
function updateExtraFoodPrice(extra_food_id, price) 
{   
    input_value = $(".ef_qty_"+extra_food_id).val();
    $(".ep_"+extra_food_id).html( input_value * price ); 
    calculateTotalAmountInFoodDetail();
}


function setRating(star_count)
{
    $("input[name='star_count']").val(star_count);
    
    for ( i = 1; i <= 5; i++ ) {
        $("#abc_"+i).removeClass('text-danger');
    }

    for ( i = 1; i <= star_count; i++ ) {
        $("#abc_"+i).addClass('text-danger');
    }
    
}

