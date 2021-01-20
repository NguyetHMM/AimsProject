@extends('layout.main')

@section('content')

    <div class="wrapper fixed__footer">
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/2.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                <h2 class="bradcaump-title">Checkout</h2>
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Checkout</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                            <div class="checkout-form">
                                <h2 class="section-title-3">Billing details</h2>
                                <div class="checkout-form-inner">
                                    <div class="single-checkout-box">
                                        <input type="text" placeholder="First Name*">
                                        <input type="text" placeholder="Last Name*">
                                    </div>
                                    <div class="single-checkout-box">
                                        <input type="email" placeholder="Email*">
                                        <input type="text" placeholder="Phone*">
                                    </div>
                                    <div class="single-checkout-box">
                                        <textarea name="message" placeholder="Message*"></textarea>
                                    </div>
                                    <input type="button" value="Xác nhận thông tin"  name="calculae_order"class="btn btn-primary btn-sm ">
                                    <form>
                                        @csrf
                                        <div class="single-checkout-box">
                                            <select name="city" id="city" class="single-checkout-box choose city">
                                                <option value="">--City--</option>
                                                @foreach($citys as $key => $ci)
                                                <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" id="city_address" placeholder="City/Province*" >

                                        </div>

                                        <div class="single-checkout-box">
                                            <select name="city" id="province" class="single-checkout-box province choose">
                                                <option value="">--Province--</option>

                                            </select>
                                            <input type="text" value="abc" name="district" id="district" placeholder="District*">
                                        </div>

                                        <div class="single-checkout-box">
                                            <select name="wards" id="wards" class="single-checkout-box wards table_true">
                                                <option value="">--Wards--</option>
                                            </select>
                                            <input type="text" placeholder="Commune*">
                                        </div>
                                        {{-- //<input type="button" value="Tính phí vận chuyển"  name="calculate_order"class="btn btn-primary btn-sm calculate_delivery"> --}}

                                    </form>
                                </div>
                            </div>

                            <div class="payment-form">
                                <h2 class="section-title-3">payment details</h2>

                                <div class="table-responsive cart_info">
				                    <table class="table table-condensed">
				                    	<thead>
				                    		<tr class="cart_menu">
				                    			<td class="image">Hình ảnh</td>
				                    			<td class="description">Tên sản phẩm</td>
				                    			<td class="price">Giá sản phẩm</td>
				                    			<td class="quantity">Số lượng</td>
				                    			<td class="total">Giá tiền</td>
				                    			<td></td>
				                    		</tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total = 0;
                                            $countProduct = 0;
                                            $totalOrder = 0;
                                            $totalOrder1=0;
                                            $fee1=Session::get('fee');
                                            $cost1=0;
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
                                                            name="{{ 'number_select' . $key }}" /></td>
                                                    <input type="hidden" name="{{ 'hidden_product' . $key }}"
                                                        value="{{ $item->id }}">
                                                    <?php
                                                    $total1 = $item->price * $item->quantity;
                                                    ?>
                                                    <td class="product-subtotal" id="{{ 'cost-product' . $key }}">{{ $total1 }}</td>

                                                </tr>
                                            @endforeach
                                            <input type="hidden" name="product_count" value="{{ $countProduct }}">
                                        </tbody>
				                    	<tbody>

                                            <tr>
                                                <?php


                                                ?>
                                                {{-- //<input type="hidden" name="product_count" value="{{ $fee1}}"> --}}
				                    			<td colspan="4">&nbsp;</td>
				                    			<td colspan="2">
				                    				<table class="table table-condensed total-result">
                                                        {{-- echo {{$countProduct}} --}}
				                    					<tr>
				                    						<td>Tổng</td>
				                    						<td class="total-order">{{$totalOrder}}</td>
                                                        </tr>
                                                        <?php
                                                         //$fee_shi=Session::get('fee');
                                                        //$fee_shi=$fee_ship->fee_feeship;
                                                        ?>
				                    					<tr class="shipping-cost">
				                    						<td>Phí vận chuyển</td>
				                    						<td>{{Session::get('fee')}}</td>
                                                        </tr>
                                                        <?php

                                                        ?>
				                    					<tr>
				                    						<td>Thành tiền</td>
				                    						<td class="cost1">{{$totalOrder1}}</td>

				                    					</tr>
				                    				</table>
				                    			</td>
				                    		</tr>
				                    	</tbody>
				                    </table>
			                    </div>
                            </div>
                            <!-- End Payment Box -->
                            <!-- Start Payment Way -->
                            <div class="our-payment-sestem">

                                <div class="checkout-btn">
                                    <a class="ts-btn btn-light btn-large hover-theme" href="#">CONFIRM & BUY NOW</a>
                                </div>
                            </div>
                            <!-- End Payment Way -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if(action == 'city'){
                    result = 'province';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url:"{{route('payment.select_delivery')}}",
                    method:"POST",
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                        $('#'+result).html(data);
                    }
                });
            });
        })
    </script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.table_true').on('change',function(){
            var matp = $('.city').val();
            var maqh = $('.province').val();
            var maxp = $('.wards').val();
            //var fee_feeship1 = $('.fee').val();
            var _token = $('input[name="_token"]').val();
            if(matp=='' || maqh==''|| maxp==''){
                alert('Làm ơn chọn để tính phí vận chuyển');
            }else{
                $.ajax({
                    url:"{{route('payment.select_delivery_done')}}",
                    method:"POST",
                    data:{matp:matp,maqh:maqh,maxp:maxp,_token:_token},
                    success:function(data){
                        //$('#'+result).html(data);
                        location.reload();
                        //$('#'+result).html(data);
                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(':input[type="number"]').click(function() {
            var totalOrder = 0;
            var totalOrder1=0;
            var product_number = '<?php echo $countProduct; ?>';
            var ship = parseInt('<?php echo $fee1; ?>');

            for (var i = 0; i < product_number; i++) {
                let price = parseInt($('.number_select' + i).val()) *
                    parseInt($('#product-price' + i).html());
                $('#cost-product' + i).html(numeral(price).format());
                totalOrder += price;
            }
            totalOrder1=totalOrder+ship;
            $('.total-order').html(numeral(totalOrder).format());
            $('.cost1').html(numeral(totalOrder1).format());
            //x$('.ship_p').html(numeral(ship1).format());
        });
    });
    window.onload = function() {
        var totalOrder = 0;
        var totalOrder1 =0;
        var product_number = '<?php echo $countProduct; ?>';
       // var ship = '<?php echo $fee1; ?>';
       var ship = parseInt('<?php echo $fee1; ?>');
        for (var i = 0; i < product_number; i++) {
            let price = parseInt($('.number_select' + i).val()) *
                parseInt($('#product-price' + i).html());
            $('#cost-product' + i).html(numeral(price).format());
            totalOrder += price;

        }
        totalOrder1=totalOrder+ship;
        //let cost1=totalOrder+parseInt($('#ship_p').val())
        $('.total-order').html(numeral(totalOrder).format());
        $('.cost1').html(numeral(totalOrder1).format());
        //$('.cost1').html(numeral(cost1).format());

    }

</script>
@endsection


