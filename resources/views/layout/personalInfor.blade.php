@extends('layout.main')

@section('content')
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url({{ asset('images/slider/bg/5.jpg') }}) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner text-center">
                        <h2 class="bradcaump-title" style="color: white">Personal Information</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="categories-slider-area bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style" style="margin: 5% 0">
                <div class="categories-menu mrg-xs">
                    <div class="category-heading">
                        <h3> Personal Information</h3>
                    </div>
                    <div class="category-menu-list">
                        <ul>
                            <li>
                                <a href="{{ Route('userProfile') }}"><img alt=""
                                        src="{{ asset('images/icons/thum2.png') }}"> Personal
                                    Details</a>
                            </li>
                            <li>
                                <a href="{{ Route('orderHistory') }}"><img alt=""
                                        src="{{ asset('images/icons/thum3.png') }}"> My Orders
                                </a>
                            </li>
                            <li>
                                <a href="{{ Route('logout') }}"><img alt=""
                                        src="{{ asset('images/icons/thum11.png') }}"> Logout </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style" style="margin: 5% 0; padding-left: 10%">
                <!-- Start Slider Area -->
                @yield('personalInfor')
                <!-- Start Slider Area -->
            </div>
        </div>
    </div>
</section>

@endsection
