<?php
    use App\Http\Controllers\ProductsController;
    $cart = 0 ;
    if(Auth::check()){
        $cart = ProductsController::cartItems();
        $user = 1;
    }
    else{
        $user=0;
    }
?>
<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
            @if(Auth::user()->role == 'admin')
                <li class="search-bar input-group">
                    <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split"></i>
                        <span class="d-lg-none d-md-block">{{ __('Search') }}</span>
                    </button>
                </li>
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="notification d-none d-lg-block d-xl-block"></div>
                        <i class="tim-icons icon-sound-wave"></i>
                        <p class="d-lg-none"> {{ __('Notifications') }} </p>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Mike John responded to your email') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('You have 5 more tasks') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Your friend Michael is in town') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Another notification') }}</a>
                        </li>
                        <li class="nav-link">
                            <a href="#" class="nav-item dropdown-item">{{ __('Another one') }}</a>
                        </li>
                    </ul>
                </li>
            @endif
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{ asset('black') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block"></b>
                        <p class="d-lg-none">{{ __('Log out') }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                        </li>
                        @if(Auth::user()->role == 'admin')
                            <li class="nav-link">
                                <a href="{{ route('dashboard') }}" class="nav-item dropdown-item">{{ __('Dashboard') }}</a>
                            </li>
                        @else
                            <li class="nav-link">
                                <a href="{{ route('home') }}" class="nav-item dropdown-item">{{ __('Home') }}</a>
                            </li>
                        @endif
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        </li>
                    </ul>
                </li>
                @if($user == 1)
                <li class=" nav-item">
                    <a href="{{ route('cartList') }}" class="contact-logo cart-logo nav-link" style="width: max-content;"><i class="fas fa-shopping-cart"> (<span class="cart-counter"> {{ $cart }}</span>) </i> </a>
                </li> 
                <li class="nav-item">
                    <a href="" class="nav-link" style="width: max-content;"><i class="tim-icons icon-bag-16 ">(<span> 0 </span>)</i> </a>
                </li>  
                @endif
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>
<div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                    <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
        </div>
    </div>
</div>
