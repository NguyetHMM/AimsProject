@extends('layout.main')

@section('content')
<div class="body__overlay"></div>

<!-- Start Feature Product -->
<section class="categories-slider-area bg__white">
    <div class="container">
        <div class="row">
            <!-- Start Left Feature -->
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                <!-- Start Slider Area -->
                <div class="slider__container slider--one">
                    <div class="slider__activation__wrap owl-carousel owl-theme">
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit slider-text-right"
                            style="background: rgba(0, 0, 0, 0) url(images/slider/bg/5.jpg) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1 style="color: white">New CD-DVD <span
                                                    class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="{{ Route('showBook') }}"
                                                    style="color: white">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit  slider-text-left"
                            style="background: rgba(0, 0, 0, 0) url(images/slider/bg/bg3.jpeg) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>New Book <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn"
                                                    href="{{ Route('showBook') }}">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                    </div>
                </div>
                <!-- Start Slider Area -->
            </div>
            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                <div class="categories-menu mrg-xs">
                    <div class="category-heading">
                        <h3> Product Categories</h3>
                    </div>
                    <div class="category-menu-list">
                        <ul>
                            <li>
                                <a href="{{ Route('showBook') }}"><img alt=""
                                        src="{{ asset('images/icons/book.png') }}"> Books <i
                                        class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-part-1 category-common mb--30">
                                        <h4 class="categories-subtitle"> Books</h4>
                                        <ul>
                                            @foreach($bookKinds as $key=>$kind)
                                                <li><a
                                                        href="{{ Route('showBookPhysical',$kind->id) }}">{{ $kind->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="category-part-2 category-common mb--30">
                                        <h4 class="categories-subtitle"> E-books</h4>
                                        <ul>
                                            @foreach($bookKinds as $key=>$kind)
                                                <li><a
                                                        href="{{ Route('showBookOnline',$kind->id) }}">{{ $kind->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                            </li>
                            <li>
                                <a href="{{ Route('showCDs') }}"><img alt=""
                                        src="{{ asset('images/icons/CD.png') }}"> CDs <i class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-part-1 category-common mb--30">
                                        <h4 class="categories-subtitle"> CDs</h4>
                                        <ul>
                                            @foreach($cdKinds as $key=>$kind)
                                                <li><a
                                                        href="{{ Route('showBookPhysical',$kind->id) }}">{{ $kind->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="category-part-2 category-common mb--30">
                                        <h4 class="categories-subtitle"> E-CDs</h4>
                                        <ul>
                                            @foreach($cdKinds as $key=>$kind)
                                                <li><a
                                                        href="{{ Route('showBookOnline',$kind->id) }}">{{ $kind->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ Route('showDVDs') }}"><img alt=""
                                        src="{{ asset('images/icons/DVD.png') }}"> DVDs <i class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-part-1 category-common mb--30">
                                        <h4 class="categories-subtitle"> DVDs</h4>
                                        <ul>
                                            @foreach($dvdKinds as $key=>$kind)
                                                <li><a
                                                        href="{{ Route('showBookPhysical',$kind->id) }}">{{ $kind->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="category-part-2 category-common mb--30">
                                        <h4 class="categories-subtitle"> E-DVDs</h4>
                                        <ul>
                                            @foreach($dvdKinds as $key=>$kind)
                                                <li><a
                                                        href="{{ Route('showBookOnline',$kind->id) }}">{{ $kind->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ Route('showLPs') }}"><img alt=""
                                        src="{{ asset('images/icons/lp.png') }}"> Long-Player
                                    Record <i class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-part-1 category-common mb--30">
                                        <h4 class="categories-subtitle"> Long-Player</h4>
                                        <ul>
                                            @foreach($lpKinds as $key=>$kind)
                                                <li><a
                                                        href="{{ Route('showBookPhysical',$kind->id) }}">{{ $kind->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="category-part-2 category-common mb--30">
                                        <h4 class="categories-subtitle"> E-Long-Player</h4>
                                        <ul>
                                            @foreach($lpKinds as $key=>$kind)
                                                <li><a
                                                        href="{{ Route('showBookOnline',$kind->id) }}">{{ $kind->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Left Feature -->
        </div>
    </div>
</section>
<!-- End Feature Product -->

<div class="only-banner ptb--100 bg__white">
    <div class="container">
        <div class="only-banner-img">
            <a href="{{ Route('showCDs') }}"><img src="images/new-product/6.jpg"
                    alt="new product"></a>
        </div>
    </div>
</div>

<!-- Start Our Product Area -->

@endsection
