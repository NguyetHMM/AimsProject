@extends('layout.main')

@section('content')
<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
    <!-- Start Offset MEnu -->
    <div class="offsetmenu">
        <div class="offsetmenu__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="off__contact">
                <div class="logo">
                    <a href="index.html">
                        <img src="images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <p>Lorem ipsum dolor sit amet consectetu adipisicing elit sed do eiusmod tempor incididunt ut labore.</p>
            </div>
            <ul class="sidebar__thumd">
                <li>
                    <a href="#"><img src="images/sidebar-img/1.jpg" alt="sidebar images"></a>
                </li>
                <li>
                    <a href="#"><img src="images/sidebar-img/2.jpg" alt="sidebar images"></a>
                </li>
                <li>
                    <a href="#"><img src="images/sidebar-img/3.jpg" alt="sidebar images"></a>
                </li>
                <li>
                    <a href="#"><img src="images/sidebar-img/4.jpg" alt="sidebar images"></a>
                </li>
                <li>
                    <a href="#"><img src="images/sidebar-img/5.jpg" alt="sidebar images"></a>
                </li>
                <li>
                    <a href="#"><img src="images/sidebar-img/6.jpg" alt="sidebar images"></a>
                </li>
                <li>
                    <a href="#"><img src="images/sidebar-img/7.jpg" alt="sidebar images"></a>
                </li>
                <li>
                    <a href="#"><img src="images/sidebar-img/8.jpg" alt="sidebar images"></a>
                </li>
            </ul>
            <div class="offset__widget">
                <div class="offset__single">
                    <h4 class="offset__title">Language</h4>
                    <ul>
                        <li><a href="#"> Engish </a></li>
                        <li><a href="#"> French </a></li>
                        <li><a href="#"> German </a></li>
                    </ul>
                </div>
                <div class="offset__single">
                    <h4 class="offset__title">Currencies</h4>
                    <ul>
                        <li><a href="#"> USD : Dollar </a></li>
                        <li><a href="#"> EUR : Euro </a></li>
                        <li><a href="#"> POU : Pound </a></li>
                    </ul>
                </div>
            </div>
            <div class="offset__sosial__share">
                <h4 class="offset__title">Follow Us On Social</h4>
                <ul class="off__soaial__link">
                    <li><a class="bg--twitter" href="#" title="Twitter"><i class="zmdi zmdi-twitter"></i></a></li>

                    <li><a class="bg--instagram" href="#" title="Instagram"><i class="zmdi zmdi-instagram"></i></a></li>

                    <li><a class="bg--facebook" href="#" title="Facebook"><i class="zmdi zmdi-facebook"></i></a></li>

                    <li><a class="bg--googleplus" href="#" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a></li>

                    <li><a class="bg--google" href="#" title="Google"><i class="zmdi zmdi-google"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Offset MEnu -->
    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="shp__cart__wrap">
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="images/product/sm-img/1.jpg" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                        <span class="quantity">QTY: 1</span>
                        <span class="shp__price">$105.00</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="#">
                            <img src="images/product/sm-img/2.jpg" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="product-details.html">Brone Candle</a></h2>
                        <span class="quantity">QTY: 1</span>
                        <span class="shp__price">$25.00</span>
                    </div>
                    <div class="remove__btn">
                        <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <li class="total__price">$130.00</li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="cart.html">View Cart</a></li>
                <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
            </ul>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->
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
                        <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url(images/slider/bg/5.jpg) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1 style="color: white">New Product <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="cart.html" style="color: white">shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Slide -->
                        <!-- Start Single Slide -->
                        <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url(images/slider/bg/2.png) no-repeat scroll center center / cover ;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                        <div class="slider__inner">
                                            <h1>New Product <span class="text--theme">Collection</span></h1>
                                            <div class="slider__btn">
                                                <a class="htc__btn" href="cart.html">shop now</a>
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
                        <h3> Browse Categories</h3>
                    </div>
                    <div class="category-menu-list">
                        <ul>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum2.png"> Women’s Clothing <i class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-part-1 category-common mb--30">
                                        <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                        <ul>
                                            <li><a href="#"> Men’s Clothing</a></li>
                                            <li><a href="#"> Computer & Office</a></li>
                                            <li><a href="#"> Jewelry & Watches</a></li>
                                            <li><a href="#"> Bags & Shoes</a></li>
                                            <li><a href="#"> Phones & Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="category-part-2 category-common mb--30">
                                        <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                        <ul>
                                            <li><a href="#"> Men’s Clothing</a></li>
                                            <li><a href="#"> Computer & Office</a></li>
                                            <li><a href="#"> Jewelry & Watches</a></li>
                                            <li><a href="#"> Bags & Shoes</a></li>
                                            <li><a href="#"> Phones & Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="category-part-3 category-common">
                                        <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                        <ul>
                                            <li><a href="#"> Men’s Clothing</a></li>
                                            <li><a href="#"> Computer & Office</a></li>
                                            <li><a href="#"> Jewelry & Watches</a></li>
                                            <li><a href="#"> Bags & Shoes</a></li>
                                            <li><a href="#"> Phones & Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="category-part-4 category-common">
                                        <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                        <ul>
                                            <li><a href="#"> Men’s Clothing</a></li>
                                            <li><a href="#"> Computer & Office</a></li>
                                            <li><a href="#"> Jewelry & Watches</a></li>
                                            <li><a href="#"> Bags & Shoes</a></li>
                                            <li><a href="#"> Phones & Accessories</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum3.png"> Man Fashion <i class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-part-1 category-common2 mb--30">
                                        <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                        <ul>
                                            <li><a href="#"> Men’s Clothing</a></li>
                                            <li><a href="#"> Computer & Office</a></li>
                                            <li><a href="#"> Jewelry & Watches</a></li>
                                            <li><a href="#"> Bags & Shoes</a></li>
                                            <li><a href="#"> Phones & Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="category-part-2 category-common2 mb--30">
                                        <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                        <ul>
                                            <li><a href="#"> Men’s Clothing</a></li>
                                            <li><a href="#"> Computer & Office</a></li>
                                            <li><a href="#"> Jewelry & Watches</a></li>
                                            <li><a href="#"> Bags & Shoes</a></li>
                                            <li><a href="#"> Phones & Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="category-part-3 category-common2 mb--30">
                                        <h4 class="categories-subtitle">dress</h4>
                                        <ul>
                                            <li><a href="#"> Men’s Clothing</a></li>
                                            <li><a href="#"> Computer & Office</a></li>
                                            <li><a href="#"> Jewelry & Watches</a></li>
                                            <li><a href="#"> Bags & Shoes</a></li>
                                            <li><a href="#"> Phones & Accessories</a></li>
                                        </ul>
                                    </div>
                                    <div class="mega-banner-img">
                                        <a href="single-product.html">
                                            <img src="images/feature-img/5.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum4.png"> Computer & Office <i class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-menu-dropdown-top">
                                        <div class="category-part-1 category-common2 mb--30">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-part-2 category-common2 mb--30">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-part-3 category-common2 mb--30">
                                            <h4 class="categories-subtitle">Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="category-menu-dropdown-bottom">
                                        <div class="single-category-brand">
                                            <a href="#"><img src="images/brand/6.png" alt=""></a>
                                        </div>
                                        <div class="single-category-brand">
                                            <a href="#"><img src="images/brand/7.png" alt=""></a>
                                        </div>
                                        <div class="single-category-brand">
                                            <a href="#"><img src="images/brand/8.png" alt=""></a>
                                        </div>
                                        <div class="single-category-brand">
                                            <a href="#"><img src="images/brand/9.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum5.png"> Jewelry & Watches <i class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-menu-dropdown-left">
                                        <div class="category-part-1 category-common mb--30">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-part-2 category-common mb--30">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-part-3 category-common">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-part-4 category-common">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="category-menu-dropdown-right">
                                        <div class="menu-right-img">
                                            <a href="#"><img src="images/feature-img/2.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum6.png"> Men’s Clothing <i class="zmdi zmdi-chevron-right"></i></a>
                                <div class="category-menu-dropdown">
                                    <div class="category-menu-dropdown-left">
                                        <div class="category-part-1 category-common">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones </a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                        <div class="category-part-2 category-common">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones </a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="category-menu-dropdown-right">
                                        <div class="menu-right-img">
                                            <a href="#"><img src="images/feature-img/1.png" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum7.png"> Bags & Shoes</a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum8.png"> Toys & Kids & Baby</a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum9.png"> Automobiles </a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum10.png"> Jewelry & Watches</a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum2.png"> Consumer Electronics</a>
                            </li>
                            <li>
                                <a href="#"><img alt="" src="images/icons/thum3.png"> all Accessories</a>
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
            <a href="shop-sidebar.html"><img src="images/new-product/6.jpg" alt="new product"></a>
        </div>
    </div>
</div>

<!-- Start Our Product Area -->
<section class="htc__product__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="product-categories-all">
                    <div class="product-categories-title">
                        <h3>kids & MOTHER</h3>
                    </div>
                    <div class="product-categories-menu">
                        <ul>
                            <li><a href="#">awesome Rings</a></li>
                            <li><a href="#">Hot Earrings</a></li>
                            <li><a href="#">Jewelry Sets</a></li>
                            <li><a href="#">Beads Jewelry</a></li>
                            <li><a href="#">Men's Watches</a></li>
                            <li><a href="#">Women’s Watches</a></li>
                            <li><a href="#">Popular Bracelets</a></li>
                            <li><a href="#"> Pendant Necklaces</a></li>
                            <li><a href="#">Children's Watches</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="product-style-tab">
                    <div class="product-tab-list">
                        <!-- Nav tabs -->
                        <ul class="tab-style product-tab-list-btn" role="tablist">
                            <li class="active">
                                <a href="#home9" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>latest </h4>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#home10" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>best sale </h4>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#home11" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>top rated</h4>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#home12" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>on sale</h4>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="all-product-btn">
                            <a href="shop-sidebar.html">all</a>
                        </div>
                    </div>
                    <div class="tab-content another-product-style">
                        <div class="tab-pane active" id="home9">
                            <div class="row">
                                <div class="product-slider-active2">
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/3.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/4.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/5.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="home10">
                            <div class="row">
                                <div class="product-slider-active2">
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/4.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/5.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/6.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="home11">
                            <div class="row">
                                <div class="product-slider-active2">
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/2.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/1.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/5.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="home12">
                            <div class="row">
                                <div class="product-slider-active2">
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/9.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/8.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                        <div class="product">
                                            <div class="product__inner">
                                                <div class="pro__thumb">
                                                    <a href="#">
                                                        <img src="images/product/7.png" alt="product images">
                                                    </a>
                                                </div>
                                                <div class="product__hover__info">
                                                    <ul class="product__action">
                                                        <li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li>
                                                        <li><a title="Add TO Cart" href="cart.html"><span class="ti-shopping-cart"></span></a></li>
                                                        <li><a title="Wishlist" href="wishlist.html"><span class="ti-heart"></span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product__details">
                                                <h2><a href="product-details.html">Simple Black Clock</a></h2>
                                                <ul class="product__price">
                                                    <li class="old__price">$16.00</li>
                                                    <li class="new__price">$10.00</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection