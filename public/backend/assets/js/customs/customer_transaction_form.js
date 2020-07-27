$("select[name='transaction_to_id']").change(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let url = "{!! route('backend.customer.wallet_amount') !!}";
    let user_id = $(this).val();
    $.ajax({
        type: 'GET',
        url: url,
        data: {'user_id': user_id},
        success: function (data) {
            $('#wallet_amount').text(data);
        }
    });
});
