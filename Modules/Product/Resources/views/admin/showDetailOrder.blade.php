@extends('layout.admin')
@section('admin-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ml-5">Detail order of {{$name->name}}</h1>
    </div>
    
    <div class="card-body">
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped nowrap" id="dataTable" width="100%" cellspacing="0"
                style="text-align: center">
                <thead>
                    <tr>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Total</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="product-thumbnail">Image</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Total</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $subTotal = 0;
                    $totalOrder = 0;
                    ?>

                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img style="width: 75px; height:75px" src="{{ asset('images/product/4.png') }}" alt="product img" /></td>
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
    </div>
    <button class="btn btn-primary" onclick="goBack()"><i class="fas fa-arrow-left"></i></button>
    <div class="row">
        <div class="col-md-5 col-sm-7 col-xs-12">
        </div>
        <div class="col-md-7 col-sm-5 col-xs-12">
            <div class="cart_totals">
                <table>
                    <tbody>
                        <tr class="order-total">
                            <th>Status</th>
                            <td>
                                @if ($name->id == 1)
                                    <strong><span
                                        class="amount total-order text-primary">{{ $name->stateName }}</span></strong>
                                @elseif($name->id == 2)
                                    <strong><span
                                        class="amount total-order text-success">{{ $name->stateName }}</span></strong>  
                                @else
                                    <strong><span
                                        class="amount total-order text-danger">{{ $name->stateName }}</span></strong> 
                                @endif
                            </td>
                        </tr>
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
                            <th><h4>Order Totals</h4></th>
                            <td>
                                <strong><h4>{{ $totalOrder }}</h4></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

<script>
    function goBack() {
        window.history.back();
    }
</script>