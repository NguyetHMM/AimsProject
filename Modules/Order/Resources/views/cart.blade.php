@extends('layout.main')

@section('content') 

    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('images/slider/bg/5.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title" style="color: white">Cart</h2>
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html" style="color: white">Home</a>
                                <span class="brd-separetor" style="color: white">/</span>
                                <span class="breadcrumb-item active" style="color: white">Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(isset($product_details[0]))
    <?php $productTypeID = $product_details[0]->productTypeID?>
    <div class="cart-main-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form action="{{ route('cart') }}" method="POST">
                        @csrf
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    $countProduct = 0;
                                    $totalOrder = 0;
                                    ?>

                                    @foreach ($product_details as $key => $item)
                                        <?php
                                        $countProduct += 1;
                                        $total += $item->price * $item->quantity;
                                        $totalOrder += $total;
                                        ?>
                                        <tr>
                                            <td class="product-thumbnail"><a
                                                    href="{{ URL::to('product/product-detail/' . $item->productID) }}"><img
                                                        src="{{ asset('images/product/4.png') }}" alt="product img" /></a>
                                            </td>
                                            <td class="product-name"><a
                                                    href="{{ URL::to('product/product-detail/' . $item->productID) }}">{{ $item->title }}</a>
                                            </td>
                                            <td class="product-price"><span class="amount"
                                                    id="{{ 'product-price' . $key }}">{{ $item->price }}</span></td>
                                            <td class="product-quantity"><input type="number" value="{{ $item->quantity }}"
                                                    class="{{ 'number_select' . $key }}" min="1"
                                                    name="{{ 'number_select' . $key }}" max="{{$max_quantity[$key]}}" required/></td>
                                            <input type="hidden" name="{{ 'hidden_product' . $key }}"
                                                value="{{ $item->id }}">
                                            <td class="product-subtotal" id="{{ 'cost-product' . $key }}">{{ $total }}</td>
                                            <td class="product-remove">
                                                <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không?')"
                                                    href="{{ URL::to('/order/deleteFromCart/' . $item->productID) }}"
                                                    class="active" ui-toggle-class="">X
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <input type="hidden" name="product_count" value="{{ $countProduct }}">
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <a href="{{ Route('welcome') }}">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Cart Totals</h2><br>
                                    <h2 class=" amount total-order">{{ $totalOrder }}</h2>
                                    <div class="wc-proceed-to-checkout">
                                        <a> <button type="submit"
                                                style="background-color: transparent; border:transparent; height: 40px; ">PROCESS
                                                TO CHECKOUT</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $(':input[type="number"]').click(function() {
                var totalOrder = 0;
                var product_number = '<?php echo $countProduct; ?>';
                for (var i = 0; i < product_number; i++) {
                    let price = parseInt($('.number_select' + i).val()) *
                        parseInt($('#product-price' + i).html());
                    $('#cost-product' + i).html(numeral(price).format('0,0[.]00 $'));
                    totalOrder += price;
                }
                $('.total-order').html(numeral(totalOrder).format('0,0[.]00 $'));
            });
        });
        window.onload = function() {
            var totalOrder = 0;
            var product_number = '<?php echo $countProduct; ?>';
            for (var i = 0; i < product_number; i++) {
                let price = parseInt($('.number_select' + i).val()) *
                    parseInt($('#product-price' + i).html());
                $('#cost-product' + i).html(numeral(price).format('0,0[.]00 $'));
                totalOrder += price;
            }
            $('.total-order').html(numeral(totalOrder).format('0,0[.]00 $'));
        }

    </script>
    <script type="text/javascript">
         $(document).ready(function () {
            var val = "<?php echo $productTypeID ?>";
            console.log(val);
            if(val != 2){
                $('input').attr('disabled', 'disabled');
            }
         });
    </script>
    @else
    <div class="container">
        <div class="row">
            <div class="alert alert-danger">Giỏ hàng của bạn đang trống, hãy trở về <a href="{{route('welcome')}}">trang chủ</a> để tiếp tục mua sắm</div>
        </div>
    </div>
    @endif
@endsection
