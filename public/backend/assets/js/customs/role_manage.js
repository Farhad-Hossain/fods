var types = ['add', 'edit', 'view', 'delete'];
        function traverseAndCheck () {
            for(i = 0; i < arguments.length; i++) {
                var role = arguments[i];
                $.each(types, function(key, value) {
                    role_action = role+value;
                    $("input[name="+role_action+"]").prop('checked', true);
                });    
            }
        }
        function traverseAndUncheck () {
            for(i = 0; i < arguments.length; i++) {
                var role = arguments[i];
                $.each(types, function(key, value) {
                    role_action = role+value;
                    $("input[name="+role_action+"]").prop('checked', false);
                });    
            }
        }
        function uncheckAllBtn(checkboxName) {
            $("input[name="+checkboxName+"]").prop('checked', false);
        }
        // User 
        $("input[name='user_management_s_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndCheck ('user_', 'user_role_permission_');
                uncheckAllBtn('user_management_ds_all');
            }
        });
        $("input[name='user_management_ds_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndUncheck ('user_', 'user_role_permission_');
                uncheckAllBtn('user_management_s_all');
            }
        });
        // Restaurant management
        $("input[name='rest_management_s_all']").change(function(event){
           var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndCheck ('rest_', 'rest_sales_transaction_', 'rest_payout_', 'rest_payout_request_', 'rest_rating_review_', 'rest_tags_', 'rest_favourite_');
                uncheckAllBtn('rest_management_ds_all');
            } 
        });
        $("input[name='rest_management_ds_all']").change(function(event){
           var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndUncheck ('rest_', 'rest_sales_transaction_', 'rest_payout_', 'rest_payout_request_', 'rest_rating_review_', 'rest_tags_', 'rest_favourite_');
                uncheckAllBtn('rest_management_s_all');
            } 
        });
        // Food
        $("input[name='food_management_s_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndCheck ('food_category_', 'food_category_', 'food_category_', 'food_', 'cuisine_', 'extra_food_');
                uncheckAllBtn('food_management_ds_all');
            }
        });
        $("input[name='food_management_ds_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndUncheck ('food_category_', 'food_category_', 'food_category_', 'food_', 'cuisine_', 'extra_food_');
                uncheckAllBtn('food_management_s_all');
            }
        });
        // Order
        $("input[name='order_management_s_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndCheck ('order_', 'delivery_address_', 'order_status_');
                uncheckAllBtn('order_management_ds_all');
            }
        });
        $("input[name='order_management_ds_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndUncheck ('order_', 'delivery_address_', 'order_status_');
                uncheckAllBtn('order_management_s_all');
            }
        });
        // Driver management
        $("input[name='driver_management_s_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndCheck ('driver_', 'driver_sales_transaction_', 'driver_withdrawal_');
                uncheckAllBtn('driver_management_ds_all');
            }
        });
        $("input[name='driver_management_ds_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndUncheck ('driver_', 'driver_sales_transaction_', 'driver_withdrawal_');
                uncheckAllBtn('driver_management_s_all');
            }
        });
        // Customer 
        $("input[name='customer_management_s_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndCheck ('customer_', 'customer_sales_transaction_');
                uncheckAllBtn('customer_management_ds_all');
            }
        });
        $("input[name='customer_management_ds_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndUncheck ('customer_', 'customer_sales_transaction_');
                uncheckAllBtn('customer_management_s_all');
            }
        });
        // Discount management
        $("input[name='discount_management_s_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndCheck ('discount_');
                uncheckAllBtn('discount_management_ds_all');
            }
        });
        $("input[name='discount_management_ds_all']").change(function(event){
            var thisCheck = $(this);
            if(thisCheck.is(':checked')) {
                traverseAndUncheck ('discount_');
                uncheckAllBtn('discount_management_s_all');
            }
        });
