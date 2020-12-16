@extends('layout.admin')
@section('admin-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Add Book - physical type</h1>
</div>
<div class="container" style="margin-left: 10%">
    <div class="col-10">
        <form role="form" action="{{route('savebook-phy')}}" method="post" enctype="multipart/form-data" 
        name="addbook" onsubmit="return(checkValue());">
            {{ csrf_field() }}
            <div class="form-group">
                <label">Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>

            <div class="form-group">
                <label">Author</label>
                <input type="text" name="author" class="form-control" id="author" required>
            </div>

            <div class="form-group">
                <label">Cover type</label>
                <select class="form-control" name="cover_type" id="cover_type">
                    @foreach ($cover as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label">Publisher</label>
                <input type="text" name="publisher" class="form-control" id="publisher" required>
            </div>

            <div class="form-group">
                <label">Publication date</label>
                <input type="date" name="public_date" class="form-control" id="public_date" required>
            </div>

            <div class="form-group">
                <label">Pages</label>
                <input type="number" name="pages" min="1" class="form-control" id="pages" required>
            </div>

            <div class="form-group">
                <label">Value</label>
                <input type="number" name="value" min="1" class="form-control" id="value" required>
            </div>

            <div class="form-group">
                <label">Price</label>
                <input type="int" name="price" min="1" class="form-control" id="price" required
                onfocus="myFunction(this.id)" onchange="try{setCustomValidity('')}catch(e){}">
            </div>

            <div class="form-group">
                <label">Language</label>
                <input type="text" name="language" class="form-control" id="language" required>
            </div>
            
            <div class="form-group">
                <label">Book kind</label>
                <select class="form-control" name="kind" id="kind">
                    @foreach ($kind as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label">Barcode</label>
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
                <label">Input day</label>
                <input type="date" name="input_day" class="form-control" id="input_day" required>
            </div>

            <div class="form-group">
                <label">Lenght</label>
                <input type="number" step="0.01" min="0" name="lenght" class="form-control" id="lenght" required>
            </div>

            <div class="form-group">
                <label">Width</label>
                <input type="numbet" step="0.01" min="0" name="width" class="form-control" id="width" required>
            </div>

            <div class="form-group">
                <label">Height</label>
                <input type="number" step="0.01" min="0" name="height" class="form-control" id="height" required>
            </div>

            <div class="form-group">
                <label">Weigh</label>
                <input type="number" step="0.01" min="0" name="weigh" class="form-control" id="weigh" required>
            </div>

            <button type="submit" name="add_book_phy" id="add" class="btn btn-info">Add product</button>
        </form>
    </div>
</div>

@endsection

<script>
    function checkValue(){
        if( document.addbook.price.value < document.addbook.value.value*0.3 || 
            document.addbook.price.value > document.addbook.value.value*1.5 ) {
            
            document.addbook.price.focus();
            return false;
        }
        return true;
    }
    function myFunction(x) {
        document.getElementById(x).setCustomValidity('Please enter price between 30% and 150% of value');
    }
</script>