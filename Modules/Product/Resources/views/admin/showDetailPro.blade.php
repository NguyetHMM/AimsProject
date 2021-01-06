@extends('layout.admin')
@section('admin-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Edit Product - {{$name}}</h1>
</div>
<div class="container" style="margin-left: 10%">
    <div class="col-10">
        <form role="form" action="{{route('savebook-phy')}}" method="post" enctype="multipart/form-data" 
        name="add" onsubmit="return(checkForm());">
            {{ csrf_field() }}
            <div class="form-group">
                <label">Title</label>
                <input type="text" name="title" class="form-control" value="{{$product->title}}" id="title" required>
            </div>
            @if($product->category_name == 'books')
            {{-- Book Table --}}
            <div class="form-group">
                <label">Author</label>
                <input type="text" name="author" class="form-control" value="{{$desc->author}}" id="author" required>
            </div>
            <?php //dd($product) ?>
            <div class="form-group">
                <label">Cover type</label>
                <select class="form-control" name="cover_type" id="cover_type">
                    
                    @foreach ($co_tra['covers'] as $item)
                        <option value="{{$item->id}}" {{$item->id == $desc->coverID ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label">Publisher</label>
                <input type="text" name="publisher" value="{{$desc->publisher}}" class="form-control" id="publisher" required>
            </div>

            <div class="form-group">
                <label">Publication date</label>
                <input type="date" name="public_date" value="{{$desc->publicationDate}}" class="form-control" id="public_date" required>
            </div>

            <div class="form-group">
                <label">Pages</label>
                <input type="number" name="pages" min="1" value="{{$desc->pages}}" class="form-control" id="pages" required>
            </div>
            @endif
            {{-- Product Table --}}
            <div class="form-group">
                <label">Value</label>
                <input type="number" name="value" min="1" value="{{$product->value}}" class="form-control" id="value" required>
            </div>

            <div class="form-group">
                <label">Price</label>
                <input type="int" name="price" min="1" value="{{$product->price}}" class="form-control" id="price" required
                onfocus="setPrice(this.id)" onchange="try{setCustomValidity('')}catch(e){}">
            </div>

            <div class="form-group">
                <label">Language</label>
                <input type="text" name="language" value="{{$product->language}}" class="form-control" id="language" required>
            </div>
            
            <div class="form-group">
                <label>{{$name}} Kind</label>
                @if($product->)
                @else
                <select class="form-control" name="kind[]" id="kind" multiple>
                    @foreach ($kind as $item)
                        <option value="{{$item->id}}" {{ in_array($item->id, $product_kind)  ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
                @endif
            </div>

            {{-- Physical Product Table --}}
            {{-- <div class="form-group">
                <label">Barcode</label>
                @foreach ($barcode as $key => $bar)
                    <input type="hidden" name="barCode" class="form-control" id="barCode" value="{{$bar->barcode}}">
                @endforeach
                <input type="text" name="barcode" class="form-control" id="barcode" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" id="description" rows="4" style="resize: none" required></textarea>
            </div>

            <div class="form-group">
                <label">Quantity</label>
                <input type="number" min="1" name="quantity" class="form-control" id="quantity" required>
            </div>

            <div class="form-group">
                <label">Length</label>
                <input type="number" step="0.01" min="0" name="length" class="form-control" id="length" required>
            </div>

            <div class="form-group">
                <label">Width</label>
                <input type="number" step="0.01" min="0" name="width" class="form-control" id="width" required>
            </div>

            <div class="form-group">
                <label">Heigth</label>
                <input type="number" step="0.01" min="0" name="heigth" class="form-control" id="heigth" required>
            </div>

            <div class="form-group">
                <label">Weigh</label>
                <input type="number" step="0.01" min="0" name="weigh" class="form-control" id="weigh" required>
            </div> --}}

            <button type="submit" name="add_book_phy" id="add" class="btn btn-info">Save</button>
        </form>
    </div>
</div>
@endsection
<script>
    function checkForm(){
        var isFormValid = true;
        isFormValid &= checkValue();
        isFormValid &= checkBarcode();
        return isFormValid? true:false
    }

    function checkValue(){
        if( document.add.price.value < document.add.value.value*0.3 || 
            document.add.price.value > document.add.value.value*1.5 ) {
            
            document.add.price.focus();
            return false;
        }
        return true;
    }

    function checkBarcode(){
        var a = document.add.barCode;
        var check = true
        for(var i = 0; i<a.length; i++ ){
            if(a[i]. value == document.add.barcode.value){
                document.add.barcode.focus();
                check = false;
            }
        }
        return check;
    }

    function setPrice(x) {
        document.getElementById(x).setCustomValidity('Please enter price between 30% and 150% of value');
    }
    function setBarcode(x) {
        document.getElementById(x).setCustomValidity('Barcode is identical, please enter a new barcode.');
    }
</script>