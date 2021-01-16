@extends('layout.personalInfor')

@section('personalInfor')
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
            ?>

            @foreach ($products as $product)
                <tr>
                    <td style="width: 11%; height: 11%">
                        <a href=""><img src="{{ asset('images/product/4.png') }}" alt="product img" /></a></td>
                    <td>{{ $product->productName }}</td>
                    <td>{{ $product->price}}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price * $product->quantity}}</td>
                </tr>
                <?php
                    $subTotal += $product->price * $product->quantity;
                ?>
            @endforeach
            @php
                $totalOrder = $subTotal + $ship_fee;
            @endphp
        </tbody>
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
                            <strong><span
                                    class="amount total-order">{{ $subTotal }}</span></strong>
                        </td>
                    </tr>
                    <tr>
                        <th>Ship fee</th>
                        <td>
                            <strong><span
                                    class="amount total-order">{{ $ship_fee }}</span></strong>
                        </td>
                    </tr>

                    <tr>
                        <th><h2>Order Totals</h2></th>
                        <td>
                            <strong><h2>{{ $totalOrder }}</h2></strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
