@extends ('layout.main')

@section('content')
<div class="wrapper fixed__footer">

    <div class="portfolio-grid-area bg__white pt--130 pb--100">
        <div class="container">
            <div class="portfolio-menu-active gutter-btn mb--50 text-center">
                <button class="active" data-filter="*">All works</button>
                <button data-filter=".cat2">print</button>
                <button data-filter=".cat3">Webdesign</button>
                <button data-filter=".cat5">Photography</button>
            </div>
            <div class="portfolio-style">

                <div class="row-mb-5">
                    @foreach ($all_product_of_1category as $key => $product)
                    {{-- @dd($key); --}}
                    <div class="col-md-3 col-sm-3 col-xs-6 grid-item cat2 cat3">
                        <div class="single-portfolio-card mb--30">
                            <div class="portfolio-img">
                                <a href="">
                                    <img src="{{asset('images/portfolio/equal/1.jpg')}}" alt="" />
                                </a>
                                <div class="portfolio-icon">
                                    <a class="img-poppu" href="images/portfolio/equal/2.jpg">
                                        <i class="zmdi zmdi-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="portfolio-title portfolio-card-title text-center">

                                <h3><a href="{{URL::to('product/product-detail/'.$product->id)}}">{{$product->title}}</a></h3>
                                {{-- <span>Design</span> --}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row mt--60" style="text-align: center">
                    <div class="col-md-12">
                            {{ $all_product_of_1category->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection