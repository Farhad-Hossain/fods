<a href="#" class="dropdown-toggle-no-caret" id="orderDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-shopping-cart"></i>Food Orders <span class="badge badge-secondary">{!! $contents->count() + $extra_contents->count() !!}</span>
</a>
<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="orderDropdown" id="mini_cart_dropdown">
    @if(!empty($contents))
        @foreach($contents as $content)
            <li class="dropdown-item content justify-content-between">
                <a href="#">{!! $content->name !!}</a> ({!! $content->qty !!}) &nbsp;&nbsp;
                <button onclick="removeContent({!! $content->id !!}), true" class="badge badge-primary">x</button>
            </li>
        @endforeach
    @endif
    @if(!empty($extra_contents))
        @foreach($extra_contents as $content)
            <li class="dropdown-item content justify-content-between">
                <a href="#" class="">{!! $content->name !!}</a> ({!! $content->qty !!}) &nbsp;&nbsp;
                <button onclick="removeContent({!! $content->id !!}, true)" class="badge badge-primary">x</button>
            </li>
        @endforeach
    @endif
        <a class="dropdown-item" href="{!! route('frontend.cart.checkout') !!}">
            <button class="btn btn-primary m-0">View Checkout</button>
        </a>
</ul>

