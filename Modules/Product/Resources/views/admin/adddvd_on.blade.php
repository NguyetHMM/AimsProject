@extends('layout.admin')
@section('admin-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Add DVD - online type</h1>
</div>
<div class="container" style="margin-left: 10%">
    <div class="col-10">
        <form role="form" action="{{route('savedvd-on')}}" method="post" enctype="multipart/form-data" 
        name="add" onsubmit="return(checkForm());">
            {{ csrf_field() }}
            <div class="form-group">
                <label">Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
            </div>

            {{-- DVD Table --}}
            <div class="form-group">
                <label">Director</label>
                <input type="text" name="director" class="form-control" id="director" required>
            </div>

            <div class="form-group">
                <label">Video kind</label>
                <input type="text" name="video_kind" class="form-control" id="video_kind" required>
            </div>

            <div class="form-group">
                <label">Studio</label>
                <input type="text" name="studio" class="form-control" id="studio" required>
            </div>

            <div class="form-group">
                <label">Sub title</label>
                <input type="text" name="sub_title" class="form-control" id="sub_title" required>
            </div>

            <div class="form-group">
                <label">Run time</label>
                <input type="number" name="run_time" min="1" class="form-control" id="run_time" required>
            </div>

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
                <label">DVD kind</label>
                <select class="form-control" name="kind" id="kind">
                    @foreach ($kind as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            {{-- Online Product Table --}}
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content" id="content" rows="4" style="resize: none" required></textarea>
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