@extends('layout.admin')
@section('admin-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">Add Promotion</h1>
</div>
<div class="container" style="margin-left: 10%">
    <div class="col-10">
        <form role="form" action="{{route('save-promotion')}}" method="post" enctype="multipart/form-data" onsubmit="return(checkForm());" name="add">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Percent (%)</label>
                <input type="number" name="percent" class="form-control" id="percent" min="0.01" max="99" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Start time</label>
                <input type="date" name="start_time" class="form-control" id="start_time" required>
            </div>

            <div class="form-group">
                <label>End time</label>
                <input type="date" name="end_time" class="form-control" id="end_time" onfocus="set_date(this.id)" onchange="try{setCustomValidity('')}catch(e){}" required>
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" min="1" max="1000" required>
            </div>

            <button type="submit" id="add" class="btn btn-info">Add promotion</button>
        </form>
    </div>
</div>

@endsection
<script>
    function checkForm(){
        if( document.getElementById('start_time').value < document.getElementById('end_time').value)
            return true;
        else{
            document.add.end_time.focus();
            return false;
        }
    }

    function set_date(x) {
        document.getElementById(x).setCustomValidity('Please enter the end time is greater than the start time!');
    }


</script>