@extends('layout.admin')
@section('admin-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Add Book - online type</h1>
</div>
<div class="container" style="margin-left: 10%">
    <div class="col-10">
        <form role="form" action="{{route('savebook-on')}}" method="post" enctype="multipart/form-data" 
        name="add" onsubmit="return(checkForm());">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>

            {{-- Book Table --}}
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" id="author" required>
            </div>

            <div class="form-group">
                <label>Cover type</label>
                <select class="form-control" name="cover_type" id="cover_type">
                    @foreach ($cover as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Publisher</label>
                <input type="text" name="publisher" class="form-control" id="publisher" required>
            </div>

            <div class="form-group">
                <label>Publication date</label>
                <input type="date" name="public_date" class="form-control" id="public_date" required>
            </div>

            <div class="form-group">
                <label>Pages</label>
                <input type="number" name="pages" min="1" class="form-control" id="pages" required>
            </div>

            <div class="form-group">
                <label>Book category</label>
                <input type="text" name="book_category" class="form-control" id="book_category" required>
            </div>

            {{-- Product Table --}}
            <div class="form-group">
                <label>Value</label>
                <input type="number" name="value" min="1" class="form-control" id="value" required>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="int" name="price" min="1" class="form-control" id="price" required
                onfocus="setPrice(this.id)" onchange="try{setCustomValidity('')}catch(e){}">
            </div>

            <div class="form-group">
                <label>Language</label>
                <input type="text" name="language" class="form-control" id="language" required>
            </div>
            
            <div class="form-group">
                <label>Book kind</label>
                <select class="form-control" name="kind[]" id="kind" multiple>
                    @foreach ($kind as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            
            {{-- Online product table --}}
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content" id="content" rows="4" style="resize: none" required></textarea>
            </div>

            <button type="submit" name="add_book_phy" id="add" class="btn btn-info">Add product</button>
        </form>
    </div>
</div>

@endsection

<script>
    function checkForm(){
        var isFormValid = true;
        isFormValid &= checkValue();
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
    function setPrice(x) {
        document.getElementById(x).setCustomValidity('Please enter price between 30% and 150% of value');
    }
</script>