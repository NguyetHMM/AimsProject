<header id="header" class="htc-header header--3 bg__white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="{{Route('welcome')}}">
                            <img src="{{asset('images/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('home')}}">Shop</a></li>
                            <li><a href="">contact</a></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </nav>
                </div>
                <!-- End MAinmenu Ares -->
                <div class="col-md-2 col-sm-4 col-xs-3">
                    <ul class="menu-extra">
                        <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                        @if (Auth::user())
                            <li style="min-width: 150%; text-align:right" ><a href="{{ route('userProfile') }}">HELLO {{ Auth::user()->name }}</a></li>
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                        @else
                            <li><a href="{{ route('login') }}"><span class="ti-user"></span></a></li>
                        @endif
                        {{-- <li><a href="{{ route('login') }}"><span
                                    class="ti-user"></span></a></li> --}}
                        <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                    </ul>
                </div>
            </div>
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="#" method="get">
                                    <input placeholder="Search here... " type="text">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
