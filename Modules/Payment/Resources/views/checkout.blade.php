<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Shopper</title>
    <link href="{{asset('payment/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('payment/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('payment/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('payment/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('payment/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('payment/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('payment/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<!--<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>-->
								<li><a href=""><i class="fa fa-envelope"></i> entititi@gmail.com</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-user"></i> Tài khoản</a></li>
								<li><a href=""><i class="fa fa-star"></i> Sản phẩn yêu thích</a></li>
								<li><a href="checkout.html" class="active"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<!--<li><a href="login.html"><i class="fa fa-lock"></i> </a></li>-->
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						
					</div>
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">THANH TOÁN</h2>
			</div>
			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-8 clearfix">
						<div class="bill-to">
							<p>Điền thông tin gửi hàng</p>
							<div class="form-one">
								<form>
									<!--<input type="text" placeholder="Tên công ty">-->
									<input type="text" placeholder="Email*">
									<!--<input type="text" placeholder="Title">-->
									<input type="text" placeholder="Họ và tên *">
									<!--<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">-->
									<input type="text" placeholder="Địa chỉ nhận hàng *">
									<input type="text" placeholder="Số điện thoại *">
									<input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
									<!--<a class="btn btn-primary" href="">Gửi</a>-->
								</form>
							</div>
							
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Ghi chú gửi đơn hàng</p>
							<textarea name="message"  placeholder="Ghi chú đơn hàng của bạn" rows="16"></textarea>
							<!--<label><input type="checkbox"> Shipping to bill address</label>-->
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Xem lại giỏ hàng</h2>
			</div>

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
						$cost_cart = 0
						?>
						@foreach ($products as $val)
						 <?php 
						 	$total = $val->price * $val->quantity;
							$cost_cart += $total
						 ?>
						<tr>
							<td class="cart_product">
							    <!--<img src={{asset('Order/images/detailsquare.jpg')}} alt="White Blouse Armani">-->
								<!--<a href=""><img src="{{asset('payment/images/cart/one.png')}}" alt=""></a>-->
								<a href=""><img src="{{asset('Order/images/detailsquare.jpg')}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">Colorblock Scuba</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{$val->price}}</p>
							</td>
							<td class="cart_quantity">
								<p>{{$val->quantity}}</p>
							</td>
							<td class="cart_total">
								<p>{{$total}}</p>
							</td>
							<!--<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>-->
						</tr>
						@endforeach

						
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Tổng</td>
										<td>{{$cost_cart}}</td>
									</tr>
									<!--<tr>
										<td>Thuế</td>
										<td>$2</td>
									</tr>-->
									<tr class="shipping-cost">
										<td>Phí vận chuyển</td>
										<?php
										 $go =1000
										 ?>
										<td>1000</td>										
									</tr>
									<tr>
										<td>Thành tiền</td>
										<?php
										$cost_cart = $cost_cart + $go
										?>
										<!--<td><span>$61</span></td>-->
										<td>{{$cost_cart}}</td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
		</div>
	</section> <!--/#cart_items-->


    <script src="{{asset('payment/js/jquery.js')}}"></script>
	<script src="{{asset('payment/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('payment/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('payment/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('payment/js/main.js')}}"></script>
</body>
</html>