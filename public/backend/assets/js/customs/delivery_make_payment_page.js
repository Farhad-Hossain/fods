$("select[name='transaction_to_id']").change(function(){
  alert($(this).val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    url = '{!! URL::to("/backed/customer/") !!}'+$(this).val();
    $.ajax({
       type:'GET',
       url: url,

       success:function(data){
        console.log(data);
        $('wallet_amount').text(data);
    });
});
