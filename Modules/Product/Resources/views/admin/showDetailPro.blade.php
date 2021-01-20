@extends('layout.admin')
@section('admin-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Edit Product - {{$name}}</h1>
</div>
<div class="container" style="margin-left: 10%">
    <div class="col-10">
        @if($errors->any())
            <div class="border-bottom-danger col-md-5">
                    @foreach ($errors->all() as $error)
                        <p><b>{{$error}}</p>
                    @endforeach
            </div>
        @endif
        <form role="form" action="{{route('update-product',["product_id"=>$product->id])}}" method="post" enctype="multipart/form-data" 
        name="add" onsubmit="return(checkValue());">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{$product->title}}" id="title" required>
            </div>
            {{-- <input type="text" hidden name="categoryID"  value="{{$product->categoryID}}">
            <input type="text" hidden name="typeID" value="{{$product->typeID}}"> --}}
            @if($product->category_name == 'books')
            {{-- Book Table --}}
            <div class="form-group">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="{{$desc->author}}" id="author" required>
            </div>

            <div class="form-group">
                <label>Cover type</label>
                <select class="form-control" name="cover_type" id="cover_type" required>
                    
                    @foreach ($co_tra['covers'] as $item)
                        <option value="{{$item->id}}" {{$item->id == $desc->coverID ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Publisher</label>
                <input type="text" name="publisher" value="{{$desc->publisher}}" class="form-control" id="publisher" required>
            </div>

            <div class="form-group">
                <label>Publication date</label>
                <input type="date" name="public_date" value="{{$desc->publicationDate}}" class="form-control" id="public_date" required>
            </div>

            <div class="form-group">
                <label>Pages</label>
                <input type="number" name="pages" min="1" value="{{$desc->pages}}" class="form-control" id="pages" required>
            </div>

            <div class="form-group">
                <label>Book category</label>
                <input type="text" name="book_category" value="{{$desc->category}}" class="form-control" id="book_category" required>
            </div>
            
            @elseif($product->category_name == 'dvds')
            {{-- DVDs Table --}}
            <div class="form-group">
                <label>Director</label>
                <input type="text" name="director" class="form-control" id="director" value="{{$desc->director}}" required>
            </div>

            <div class="form-group">
                <label>Video kind</label>
                <input type="text" name="video_kind" class="form-control" id="video_kind" value="{{$desc->dvdKind}}" required>
            </div>

            <div class="form-group">
                <label>Studio</label>
                <input type="text" name="studio" class="form-control" id="studio" value="{{$desc->studio}}" required>
            </div>

            <div class="form-group">
                <label>Sub title</label>
                <input type="text" name="sub_title" class="form-control" id="sub_title" value="{{$desc->subtitles}}" required>
            </div>

            <div class="form-group">
                <label>Run time (s)</label>
                <input type="number" name="run_time" min="1" class="form-control" id="run_time" value="{{$desc->runtime}}" required>
            </div>
            
            @elseif($product->categoryID == 1)
            <div class="form-group">
                <label>Artists</label>
                <input type="text" name="artists" class="form-control" id="artists" value="{{$desc->artists}}" required>
            </div>

            <div class="form-group">
                <label>Record Label</label>
                <input type="text" name="record_label" class="form-control" id="record_label" value="{{$desc->recordLabel}}" required>
            </div>

            <div class="form-group">
                <label>Music Type</label>
                <input type="text" name="music_type" class="form-control" id="music_type" value="{{$desc->musicType}}" required>
            </div>

            <div class="form-group">
                <label>Release Date</label>
                <input type="date" name="release_date" class="form-control" id="release_date" value="{{$desc->releaseDate}}" required>
            </div>
            <?php //dd($tracks) ?>
            <div class="form-group">
                <label>Tracks</label>
                <select class="form-control" name="tracks[]" id="tracks" size="10" multiple required>
                    @foreach ($co_tra['tracks'] as $item)
                        <option value="{{$item->id}}" {{in_array($item->id, $tracks) ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            @endif
            
            {{-- Product Table --}}
            <div class="form-group">
                <label>Value</label>
                <input type="number" name="value" min="1" value="{{$product->value}}" class="form-control" id="value" required>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="int" name="price" min="1" value="{{$product->price}}" class="form-control" id="price" required
                onfocus="setPrice(this.id)" onchange="try{setCustomValidity('')}catch(e){}">
            </div>

            <div class="form-group">
                <label>Language</label>
                <input type="text" name="language" value="{{$product->language}}" class="form-control" id="language" required>
            </div>
            
            <div class="form-group">
                <label>{{$name}} Kind</label>
                <select class="form-control" name="kind[]" id="kind" {{ ($product->categoryID != 2)  ? 'multiple' : ''}} required>
                    @foreach ($kind as $item)
                        <option value="{{$item->id}}" {{ in_array($item->id, $product_kind)  ? 'selected' : ''}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            @if($product->type_name == 'physical')
            {{-- Physical Product Table --}}
            <div class="form-group">
                <label>Barcode</label>
                <input type="text" name="barcode" class="form-control" id="barcode" value="{{$type->barcode}}" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" id="description" rows="4" style="resize: none" required>{{$type->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="number" min="1" name="quantity" class="form-control" id="quantity" value="{{$type->quantity}}" required>
            </div>

            <div class="form-group">
                <label>Length (cm)</label>
                <input type="number" step="0.001" min="0" name="length" class="form-control" id="length" value="{{$type->length}}" required>
            </div>

            <div class="form-group">
                <label>Width (cm)</label>
                <input type="number" step="0.001" min="0" name="width" class="form-control" id="width" value="{{$type->width}}" required>
            </div>

            <div class="form-group">
                <label>Height (cm)</label>
                <input type="number" step="0.001" min="0" name="heigth" class="form-control" id="heigth" value="{{$type->heigth}}" required>
            </div>

            <div class="form-group">
                <label>Weigh (g)</label>
                <input type="number" step="0.001" min="0" name="weigh" class="form-control" id="weigh" value="{{$type->weigh}}" required>
            </div>
            
            @elseif($product->type_name == 'online')
            {{-- Online product table --}}
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content" id="content" rows="4" style="resize: none" required>{{$type->content}}</textarea>
            </div>
            @endif
            @php
                if($name == 'CD' || $name == "LP") $name = 'cdlp'
            @endphp
            <a href="{{route('all'.strtolower($name))}}" id="add" class="btn btn-info"><i class="fas fa-arrow-left"></i></a>
            <button type="submit" id="add" class="btn btn-info"><i class="far fa-save"></i></button>
            
        </form>
    </div>
</div>
@endsection
<script>
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