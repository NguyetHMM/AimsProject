@extends('layout.admin')
@section('admin-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Add CD - physical type</h1>
</div>
<div class="container" style="margin-left: 10%">
    <div class="col-10">
        <form role="form" action="{{route('savecd-phy')}}" method="post" enctype="multipart/form-data" 
        name="add" onsubmit="return(checkForm());">
            {{ csrf_field() }}
            <div class="form-group">
                <label">Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>

            {{-- CD Table --}}
            <div class="form-group">
                <label">Artists</label>
                <input type="text" name="artists" class="form-control" id="artists" required>
            </div>

            <div class="form-group">
                <label">Record Label</label>
                <input type="text" name="record_label" class="form-control" id="record_label" required>
            </div>

            <div class="form-group">
                <label">Music Type</label>
                <input type="text" name="music_type" class="form-control" id="music_type" required>
            </div>

            <div class="form-group">
                <label">Release Date</label>
                <input type="date" name="release_date" class="form-control" id="release_date" required>
            </div>

            {{-- <div class="form-group">
                <label">Run time</label>
                <input type="number" name="run_time" min="1" class="form-control" id="run_time" required>
            </div> --}}

            {{-- Product Table --}}
            <div class="form-group">
                <label">Value</label>
                <input type="number" name="value" min="0" step="0.01" class="form-control" id="value" required>
            </div>

            <div class="form-group">
                <label">Price</label>
                <input type="number" name="price" min="0" step="0.01" class="form-control" id="price" required
                onfocus="setPrice(this.id)" onchange="try{setCustomValidity('')}catch(e){}">
            </div>

            <div class="form-group">
                <label">Language</label>
                <input type="text" name="language" class="form-control" id="language" required>
            </div>
            
            <div class="form-group">
                <label">CD kind</label>
                <select class="form-control" name="kind" id="kind">
                    @foreach ($kind as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- Physical Product Table --}}
            <div class="form-group">
                <label">Barcode</label>
                @foreach ($barcode as $key => $bar)
                    <input type="hidden" name="barCode" class="form-control" id="barCode" value="{{$bar->barcode}}">
                @endforeach
                <input type="text" name="barcode" class="form-control" id="barcode" 
                onfocus="setBarcode(this.id)" onchange="try{setCustomValidity('')}catch(e){}" required>
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
            </div>

            <button type="submit" name="adddvd_phy" id="adddvd_phy" class="btn btn-info">Add product</button>
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