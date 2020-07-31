<div class="menu">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12 col-xs-12">
                <div class="menu-left text-center text-md-left">
                    <div class="logo-box">
                        <a href="{!! route('frontend.home') !!}"><img src="{!! asset('frontend/images/') !!}/logo.svg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <div class="menu-items">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light menu-right">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto nav-text">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ URL::to('/') }}">Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">How To Orders?</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="recipes.html">Recipes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{!!route('frontend.become-a-partner')!!}">Partners</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="browse_places.html">Browse Places</a>
                                </li>
                            </ul>
                        </div>

                    </nav>
                    <div class="icons-set">
                        <ul class="list-inline">
                            <li class="icon-items nav-item dropdown ">
                                <a class="nav-link dropdown-toggle-no-caret" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                                    <div class="notification-item">
                                        <div class="search-details">
                                            <form class="form-inline">
                                                <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                                                <button class="s-btn btn-link " type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="icon-items nav-item dropdown">
                                <a class="nav-link dropdown-toggle-no-caret" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown2">
                                    <div class="notification-item">
                                        <div class="property">
                                            <ul>
                                                <li><div class="setting"><a href="#">Setting</a></div></li>
                                                <li><div class="clear"><a href="#">Clear</a></div></li>
                                            </ul>
                                        </div>
                                        <div class="notification-details">
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#"><img src="{!! asset('frontend/images/') !!}/notification-img-2.png" alt=""></a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Jassica William</h4>
                                                    <p>comment on your Video.</p>
                                                    <div class="comment-date">10 min ago</div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#"><img src="{!! asset('frontend/images/') !!}/notification-img-3.png" alt=""></a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Congratulations!</h4>
                                                    <p>Your Order is Accepted.</p>
                                                    <div class="comment-date">
                                                        15 min ago
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#"><img src="{!! asset('frontend/images/') !!}/notification-img-4.png" alt=""></a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Order Delivered!</h4>
                                                    <p>Your Order is Delivered.</p>
                                                    <div class="comment-date">20 min ago</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="partner-btn">
                                <a href="{!! route('frontend.become-a-partner') !!}" class="b-btn btn-link">Become a Partner</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
