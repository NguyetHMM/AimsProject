@extends('layout.main')
@section('content')
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url({{ asset('images/slider/bg/5.jpg') }}) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner text-center">
                            <h2 class="bradcaump-title" style="color: white">Checkout</h2>
                            <nav class="bradcaump-inner" style="color: white">
                                <a class="breadcrumb-item" href="index.html" style="color: white">Home</a>
                                <span class="brd-separetor">/</span>
                                <span class="breadcrumb-item active" style="color: white">Checkout</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Checkout Area -->
    <section class="our-checkout-area ptb--120 bg__white">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-lg-7">
                    <div class="ckeckout-left-sidebar">
                        <form method="POST" action="{{ route('checkout') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Name">Name</label>
                                        <input type="text" class="form-control" required name="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="Phone">Phone</label>
                                        <input type="text" class="form-control" required name="phone">
                                    </div>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="Message">Message</label>
                                        <textarea name="message"
                                            style="background: white; border: 1px solid #ccc"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select class="form-group" style="height: 34px; border: 1px solid #ccc" id="cities"
                                            name='cities'>
                                            @foreach ($cities as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="city">District</label>
                                        <select class="form-group" style="height: 34px; border: 1px solid #ccc"
                                            name="district">
                                            @foreach ($districts as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('phonenumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="company">Description</label>
                                        <textarea name="description" required
                                            style="background: white; border: 1px solid #ccc"></textarea>
                                    </div>
                                </div>

                                <input type="hidden" name="sub_total" id="set-sub-total" value="0">
                                <input type="hidden" name="ship_fee" id="set-ship-fee" value="0">

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-save"></i> Buy
                                        now</button>
                                </div>
                            </div>
                        </form>
                        <!-- End Payment Box -->
                    </div>
                </div>
                <div class="col-md-5 col-lg-5">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $subTotal = 0;
                                $totalOrder = 0;
                                $m = 0;

                                //Khoi luong
                                ?>

                                @foreach ($products as $product)
                                    <tr>
                                        <td style="width: 11%; height: 11%">
                                            <a href=""><img src="{{ asset('images/product/4.png') }}"
                                                    alt="product img" /></a>
                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->cart_quantity }}</td>
                                        <td>{{ $product->price * $product->cart_quantity }}</td>
                                    </tr>
                                    <?php
                                    $subTotal += $product->price * $product->cart_quantity;
                                    $m += $product->weigh * $product->cart_quantity + ($product->cart_quantity *
                                    ($product->length * $product->width * $product->heigth)) / 6000;
                                    ?>
                                @endforeach
                                @php
                                if ($subTotal >= 50) {
                                    $ship_fee = 0;
                                }else{
                                    if($m <= 3){ 
                                        $ship_fee=1; 
                                    }else{ 
                                        $ship_fee=1 + ($m-3)*0.2; 
                                    } 
                                } 
                                $totalOrder=$subTotal + $ship_fee; 
                                @endphp </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-7 col-xs-12">
                        </div>
                        <div class="col-md-7 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <table>
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Subtotal</th>
                                            <td>
                                                <span class="amount sub-total">
                                                    {{ $subTotal }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Ship fee</th>
                                            <td>
                                                <span class="amount ship-fee">
                                                    {{ $ship_fee }}
                                                </span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th><strong><span style="font-size: 25px">Order Totals</span></strong></th>
                                            <td>
                                                <strong><span style="font-size: 25px" class="total-order">{{ $totalOrder }}</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Checkout Area -->
    <script type="text/javascript">
        $(document).ready(function() {
            var ship_fee = "<?php echo $ship_fee ?>";
            // console.log(ship_fee);
            $('#cities').on('change', function(e) {
                var optionSelected = $("option:selected", this);
                var textSelected = optionSelected.text();
                var new_ship_fee;
                var subTotal = "<?php echo $subTotal ?>";
                if(textSelected == 'Ha Noi' || textSelected == 'TP. Ho Chi Minh'){
                    new_ship_fee = ship_fee;
                }else{
                    var m = "<?php echo $m ?>";
                    if(subTotal > 50){
                        new_ship_fee = 0
                    }else{
                        if(m <= 0.5){
                            new_ship_fee = 1.5;
                        }else{
                            new_ship_fee = 1.5 + (m-0.5)*0.2;
                        }
                    }
                }
                new_ship_fee = Math.round(new_ship_fee * 100) / 100;
                var totalOrder = parseFloat(new_ship_fee) + parseFloat(subTotal);
                console.log(totalOrder);
                $('.ship-fee').html(numeral(new_ship_fee).format('0,0[.]00 $'));
                $('.total-order').html(numeral(totalOrder).format('0,0[.]00 $'));
                $('#set-ship-fee').val(new_ship_fee);
                // console.log(new_ship_fee);
            });
        });

        window.onload = function() {
            var subTotal = "<?php echo $subTotal ?>";
            var totalOrder = "<?php echo $totalOrder ?>";
            $('#set-sub-total').val(subTotal);
            var ship_fee = "<?php echo $ship_fee ?>";
            $('#set-ship-fee').val(ship_fee);
            $('.ship-fee').html(numeral(ship_fee).format('0,0[.]00 $'));
            $('.sub-total').html(numeral(subTotal).format('0,0[.]00 $'));
            $('.total-order').html(numeral(totalOrder).format('0,0[.]00 $'));
        }

    </script>
@endsection
