@extends ('layout.main')

@section('content')
<div class="wrapper fixed__footer">
    @include('layout.catagory')
    <div class="portfolio-grid-area bg__white">
        <div class="container">
            <div class="portfolio-menu-active mb--50">
                <form class="form-inline"  style="margin-left: 23.8%;" action="{{Route('search')}}" method="post">
                    {{-- <div class="form-group" style="float:left;">
                        <label for="formControlRange">Range Price</label>
                        <input type="range" class="form-control-range" id="formControlRange">
                    </div> --}}
                    {{csrf_field()}}
                    <div class="form-group mb-2">
                        <select name="filter-box" id="filter-follow-sub" class="select-container form-control">
                            <option name="price" id="price" value="0">--- Price ---</option>
                            <option name="price1" id="price1" value="1">0$   ~ 100$</option>
                            <option name="price2" id="price2" value="2">100$ ~ 200$</option>
                            <option name="price3" id="price3" value="3">200$ ~ 300$</option>
                            <option name="price4" id="price4" value="4">300$ ~ 400$</option>
                            <option name="price5" id="price5" value="5">400$ ~</option>
                        </select>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="inputPassword2" class="sr-only">Name Product</label>
                        <input type="text" class="form-control" name="infoToSearch" id="nameProduct" placeholder="Enter a product's name">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Search Now</button>
                </form>
            </div>
            <div class="portfolio-style col-md-9">
                <div class="row-mb-5" id="main-show">
                    @foreach ($allProduct as $key => $product)
                    <div class="col-md-3 col-sm-3 col-xs-6 grid-item cat2 cat3" style="height: 350px">
                        <div class="single-portfolio-card mb--30">
                            <div class="">
                                <a href="{{URL::to('product/product-detail/'.$product->id)}}">
                                    <img src="{{asset('images/portfolio/equal/1.jpg')}}" alt="" />
                                </a>
                                {{-- <div class="portfolio-icon">
                                    <a class="img-poppu" href="images/portfolio/equal/2.jpg">
                                        <i class="zmdi zmdi-instagram"></i>
                                    </a>
                                </div> --}}
                            </div>
                            <div class="portfolio-title portfolio-card-title text-center">

                                <h4><a
                                        href="{{URL::to('product/product-detail/'.$product->id)}}">{{$product->title}}</a>
                                </h4>
                                <span>Price :</span>
                                <span>
                                    <script>
                                        function number(n) {
                                            return n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,') + ' $';
                                        }
                                        document.write(number({{ $product-> price}}));
                                    </script>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row-mb-5" id="main-show2">
                </div>
                <div class="row mt--60" style="text-align: center">
                    <div class="col-md-12">
                        {{ $allProduct->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filter-follow-sub').on('change',() =>{
            var rangePrice = $("#filter-follow-sub option:selected").val();
            var all_product = {!! json_encode($allProduct->toArray()) !!};
            //console.log(all_product['data'][1]['id']);
            $.ajax({
                url:"{{route('filterPrice')}}",
                type:"get",
                data:{
                    'rangePrice': rangePrice,
                    'all_product': all_product,
                },
                success:function(data) {
                    //console.log(data.products);
                    console.log(data.producthtml);
                    document.getElementById("main-show").style.display = "none";
                    document.getElementById("main-show2").innerHTML = data.producthtml;
                }
            });
        })
    });
</script>