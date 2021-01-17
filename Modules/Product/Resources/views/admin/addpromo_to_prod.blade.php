@extends('layout.admin')
@section('admin-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ml-5">Add promotion to product</h1>
    </div>

    <div class="container" style="margin-left: 10%">
        <div class="col-10">
            <form role="form" action="{{route('save-promotion-product')}}" method="post" enctype="multipart/form-data" onsubmit="return(checkForm());" name="add">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Promotions</label>
                    <select class="form-control" name="promotion" id="promotion" required>
                        <option selected disabled>--promotion--</option>
                        @foreach ($promotion as $item)
                            <option value="{{$item->id}}" {{($item->end_time < now() || $item->numberPromotion == 0) ? 'disabled' : ''}}>{{$item->percent}}% - Start: {{date("d-m-Y", strtotime($item->start_time))}} - End: {{date("d-m-Y", strtotime($item->end_time))}} - Quantity:{{$item->numberPromotion}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Categories</label>
                    <select class="form-control" name="category" id="category" onchange="checkCate()" required>
                        <option selected disabled>--category--</option>
                        @foreach ($category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>

                @if (isset($product))
                    <div class="form-group" id="3" hidden>
                    <label>Products</label>
                    <select class="form-control" name="product[]" id="product-3" size="20" multiple>
                        @foreach ($product as $item)
                            {{-- @if($item->name == 'books') --}}
                            <option value="{{$item->id}}">{{$item->title}} - {{$item->name}}</option>
                            {{-- @endif --}}
                        @endforeach
                    </select>
                </div>
                @endif

                <button type="submit" id="add" class="btn btn-info">Add</button>
            </form>
        </div>
    </div>
@endsection
<script>
    function checkCate(){
        let cate_id = document.add.category.value;
        
    }
</script>