<header id="header" class="htc-header header--3 bg__white">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                    <div class="logo">
                        <a href="{{route('welcome')}}">
                            <img src="{{asset('images/logo/logo.png')}}" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- Start MAinmenu Ares -->
                <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                    <nav class="mainmenu__nav hidden-xs hidden-sm">
                        <ul class="main__menu">
                            <li><a href="{{route('welcome')}}">Home</a></li>
                            <li><a href="{{route('welcome')}}">Shop</a></li>
                            <li><a href="">contact</a></li>
                        </ul>
                    </nav>                         
                </div>
                <!-- End MAinmenu Ares -->
                <div class="col-md-2 col-sm-4 col-xs-3">  
                    <ul class="menu-extra">
                        <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                        @if (Auth::user())
                        <li><a href="{{route('userProfile')}}"></a><p>HELLO{{ Auth::user()->name }}</p></li>                       
                        @else
                        <li><a href="{{route('login')}}"><span class="ti-user"></span></a></li> 
                        @endif
                        {{-- <li><a href="{{route('login')}}"><span class="ti-user"></span></a></li> --}}
                        <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>