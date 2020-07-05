<a href="#" class="dropdown-toggle-no-caret" id="orderDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-shopping-cart"></i>Food Orders <span class="badge badge-secondary">{!! $contents->count() !!}</span>
</a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="orderDropdown" id="mini_cart_dropdown">

    @if(!empty($contents))
        @foreach($contents as $content)
            <a class="dropdown-item" href="">
                <a href="#">{!! $content->name !!}</a> ({!! $content->qty !!}) &nbsp;&nbsp;<button onclick="removeContent({!! $content->id !!})">x</button>
            </a>
        @endforeach
    @endif

        <a class="dropdown-item" href="{!! route('frontend.cart.checkout') !!}">
            <button class="btn btn-primary">View Checkout</button>
        </a>

</div>