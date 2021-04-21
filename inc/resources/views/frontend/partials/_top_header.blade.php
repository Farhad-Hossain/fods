<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="topbar-left text-center text-md-left">
                    <ul class="list-inline">
                        <li> <a href="{{ route('frontend.contact-us') }}"> Contact </a></li>
                        <li> <a href="{{ route('frontend.about-us') }}"> About Us </a></li>
                        <li> <a href="{{ route('frontend.blog.our-blogs') }}"> Blog </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="topbar-right text-center text-md-right">
                    <ul class="list-inline">


                        <li class="nav-item dropdown" id="min_car_content">
                            <a href="#" class="dropdown-toggle-no-caret" id="orderDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart"></i>Food Orders<span class="badge badge-secondary">0</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="orderDropdown" id="mini_cart_dropdown">

                            </div>
                        </li>

                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle-no-caret" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle"></i>
                                {!!Auth::user()->name!!}  <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
                                <a class="dropdown-item" href="{{ route('frontend.myProfile') }}"> My Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </li>
                        @else
                            <li class="nav-item" id="min_car_content">
                                <a href="{!! route('login') !!}" class="dropdown-toggle-no-caret" id="">
                                    <i class="fas fa-user-circle"></i>Login
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
