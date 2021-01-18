@extends('layout.admin')
@section('admin-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ml-5">Add promotion to product</h1>
    </div>

    <div class="container" style="margin-left: 10%">
        <div class="col-10">
            <form role="form" action="{{route('save-promotion-product')}}" method="post" enctype="multipart/form-data" name="add">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Promotions</label>
                    <select class="form-control js-example-basic-multiple" name="promotion" id="promotion" required>
                             <option disabled selected value> -- select an option -- </option>
                        @foreach ($promotion as $item)
                            <option value="{{$item->id}}" {{($item->end_time < now() || $item->numberPromotion == 0) ? 'disabled' : ''}}>{{$item->percent}}% - Start: {{date("d-m-Y", strtotime($item->start_time))}} - End: {{date("d-m-Y", strtotime($item->end_time))}} - Quantity:{{$item->numberPromotion}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Kind to Discount</label>        
                    <select class="form-control js-example-basic-multiple" name="kind[]" multiple required>
                        @foreach ($category as $item)
                        <optgroup label="{{$item->name}}">
                            @foreach ($kind as $value)
                                @if ($value->productCategoryID == $item->id)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endif
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>             
                </div>


                <button type="submit" id="add" class="btn btn-info">Add</button>
            </form>
        </div>
    </div>
@endsection
<script src="{{asset('Admin/vendor/jquery/jquery.min.js')}}"></script>

<script>
    $(document).ready(() => {
            $('.js-example-basic-multiple').select2();
    });
</script>