@extends('layout.main')

@section('content')

<!-- cart-main-area start -->
<div class="cart-main-area ptb--120 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
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
                            @foreach ($listProducts as $key)
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{asset('images/portfolio/equal/1.jpg')}}" /></a></td>
                                    <td class="product-name">{{$key->title}}</td>
                                    <td class="product-price"><span class="amount">{{$key->price}}</span></td>
                                    <td class="product-quantity"><input type="number" name="quantityProduct" value="1" /></td>
                                    <td class="product-subtotal"><?php $total = ($key->price)?></td>
                                    <td class="product-remove"><a href="#">X</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-7 col-xs-12">
                            <div class="buttons-cart">
                                <a href="{{Route('welcome')}}">Continue Shopping</a>
                            </div>
                            {{-- <div class="coupon">
                                <h3>Coupon</h3>
                                <p>Enter your coupon code if you have one.</p>
                                <input type="text" placeholder="Coupon code" />
                                <input type="submit" value="Apply Coupon" />
                            </div> --}}
                        </div>
                        <div class="col-md-4 col-sm-5 col-xs-12">
                            <div class="cart_totals">
                                <h2>Cart Totals</h2>
                                <table>
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">£215.00</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <input type="radio" />
                                                        <label>
                                                            Flat Rate: <span class="amount">£7.00</span>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" />
                                                        <label>
                                                            Free Shipping
                                                        </label>
                                                    </li>
                                                    <li></li>
                                                </ul>
                                                <p><a class="shipping-calculator-button" href="#">Calculate Shipping</a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">£215.00</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="checkout.html">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
@endsection