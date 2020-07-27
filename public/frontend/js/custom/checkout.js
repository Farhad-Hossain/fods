var obj = {};
obj.cus_name = $('#customer_name').val();
obj.cus_phone = $('#mobile').val();
obj.cus_email = $('#email').val();
obj.cus_addr1 = $('#address').val();
obj.amount = $('#total_amount').val();

$('#sslczPayBtn').prop('postdata', obj);

(function (window, document) {
    var loader = function () {
        var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
        // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
        script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
        tag.parentNode.insertBefore(script, tag);
    };

    window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
})(window, document);
