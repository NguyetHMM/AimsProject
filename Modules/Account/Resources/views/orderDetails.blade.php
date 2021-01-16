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
            $total = 0;
            $countProduct = 0;
            $totalOrder = 0;
            ?>

            {{-- @foreach ($countProduct < 10) --}}
            @while ($countProduct < 10)
                <tr>
                    <td style="width: 11%; height: 11%">
                        <a href=""><img src="{{ asset('images/product/4.png') }}" alt="product img" /></a></td>
                    <td>lkasdj</td>
                    <td>lkajsd</td>
                    <td>kalsjd</td>
                    <td>lasdkad</td>
                </tr>
                <?php
                $countProduct++;
                ?>
            {{-- @endforeach --}}
            @endwhile
            {{-- <input type="hidden" name="product_count" value="{{ $countProduct }}"> --}}
        </tbody>
    </table>
</div>
@endsection
