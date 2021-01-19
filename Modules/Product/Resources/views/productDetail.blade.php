@extends('layout.main')
@section('content')

<!-- Start Product Details -->
<section class="htc__product__details bg__white">
    <div class="container">
        <div class="row">
            @if ($message = Session::get('warning'))
                {{-- <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div> --}}
                <script>
                    Swal.fire({
                        title: 'Bạn phải reset lại giỏ hàng',
                        text: "Giỏ hàng chỉ có thể có 1 loại hàng online hoặc vật lý",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý reset giỏ hàng',
                        cancelButtonText: 'Hủy',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            console.log("vao day");
                            //window.location = "localhost:8000/order/cart-reset/";
                            window.location.href = "/order/cart-reset";
                        }
                    });
                </script>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('info'))
                <div class="alert alert-info alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
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
            <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-30 xmt-30">
                <div class="htc__product__details__inner">
                    @foreach ($detailForProduct as $key)
                    <div class="pro__detl__title">
                        <h2>{{$key->title}}</h2>
                    </div>
                    {{-- @yield('content') --}}
                    <div class="pro__details">
                        <h3 class="title__6">Detail</h3>
                        @if ($key->productCategoryID == 3)
                        <ul style="font-size: 17px;">
                            <li><strong>Language: </strong>{{$key->language}}</li>
                            <li><strong>Author: </strong>{{$key->author}}</li>
                            <li><strong>Publisher: </strong>{{$key->publisher}}<li>
                            <li>{{$key->pages}} pages.</li>
                            <li><strong>Description: </strong>{{$key->description}} </li>
                            <li><strong>Width: </strong>{{$key->width}} (m)</li>
                            <li><strong>Heigth: </strong>{{$key->heigth}} (m)</li>
                            <li><strong>Weight: </strong>{{$key->weigh}} (kg)</li>
                        </ul>
                        @elseif ($key->productCategoryID == 2)
                        <ul style="font-size: 17px;">
                            <li><strong>Language: </strong>{{$key->language}}</li>
                            <li><strong>Director: </strong>{{$key->director}}</li>
                            <li><strong>Video kind: </strong>{{$key->videoKind}}</li>
                            <li><strong>Studio: </strong>{{$key->studio}}</li>
                            <li><strong>Subtitles: </strong>{{$key->subtitles}}</li>
                            <li><strong>Time: </strong>{{$key->runtime}} (s)
                            <li><strong> Description: </strong>{{$key->description}}</li>
                            <li><strong>Width: </strong>{{$key->width}} (m)</li>
                            <li><strong>Heigth: </strong>{{$key->heigth}} (m)</li>
                            <li><strong>Weight: </strong>{{$key->weigh}} (kg)</li>
                        </ul>
                        @else
                        <ul style="font-size: 17px;">
                            <li><strong>Language: </strong>{{$key->language}}</li>
                            <li><strong>Artists: </strong>{{$key->artists}}</li>
                            <li><strong>Record Label: </strong>{{$key->recordLabel}}</li>
                            <li><strong>Music Type: </strong>{{$key->musicType}}</li>
                            <li><strong>Description: </strong>{{$key->description}} </li>
                            <li><strong>Width: </strong>{{$key->width}} (m)</li>
                            <li><strong>Heigth: </strong>{{$key->heigth}} (m)</li>
                            <li><strong>Weight: </strong>{{$key->weigh}} (kg)</li>
                        </ul>
                        @endif

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
                                    document.write(number({{ $key-> price}}));
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
                            <button class="buy__now__btn" type="submit" style="background-color: transparent; border:0.5px solid #252525; height: 40px; padding:0 30px ">BUY
                            NOW</button>
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