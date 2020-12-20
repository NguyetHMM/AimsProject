@extends('layout.main')
@section('content')
        
        <!-- Start Product Details -->
        <section class="htc__product__details pt--120 pb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                        <div class="product__details__container">
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active product-video-position" id="img-tab-1">
                                        <img src="{{asset('images/portfolio/equal/1.jpg')}}" alt="full-image">
                                        <div class="product-video">
                                            <a class="video-popup" href="https://www.youtube.com/watch?v=cDDWvj_q-o8">
                                                <i class="zmdi zmdi-videocam"></i> View Video
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 smt-30 xmt-30">
                        <div class="htc__product__details__inner">
                        @foreach ($detailForProduct as $key)
                            <div class="pro__detl__title">
                                <h2>{{$key->title}}</h2>
                            </div>
                            {{-- @yield('content') --}}
                            <div class="pro__details">
                                <h3 class="title__6">Detail</h3>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod temf incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostr exercitation ullamco laboris nisi ut aliquip ex ea. </p>
                            </div>
                            <ul class="pro__dtl__prize">
                                {{-- <li class="old__prize">$15.21</li> --}}
                                <div class="prodict-statas">
                                    <span>Price :</span>
                                    <span>
                                    <script>
                                        function number(n) {
                                            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,') + ' $';
                                        }                               
                                        document.write(number({{$key->price}}));
                                    </script>
                                    </span>
                                </div>
                                
                            </ul>
                            <form id='myform' method='POST' action='{{Route('addToCart')}}'>
                                {{ csrf_field() }}
                                <div class="product-action-wrap">
                                    <div class="prodict-statas"><span>Quantity :</span></div>
                                    <div class="product-quantity">
                                        
                                            <div class="product-quantity">
                                                <input class="cart-plus-minus-box" type="number" min="1" name="qtybutton" value="1">
                                                <input type="hidden" name="product_id" value="{{$key->id}}">
                                            </div>
                                        
                                    </div>
                                </div>  
                                <div class="pro__dtl__btn">
                                    @if (Auth::user())
                                        <button class="buy__now__btn" type="submit" style="background-color: transparent; border:0.5px solid #252525; height: 40px; padding:0 30px ">BUY NOW</button>
                                    @else
                                        <button class="buy__now__btn"><a href="{{Route('login')}}" style="background-color: transparent; border:0.5px solid #252525; height: 40px; padding:0 30px">BUY NOW</a></button>
                                    @endif
                                </div>
                            </form>
                        @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
@endsection