@extends('layout.admin')
@section('admin-content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Promotions</h1>
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
        DataTables documentation</a>.</p> --}}
    <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="border-bottom-success"><b>'.$message.'</span>';
            Session::put('message',null);
        }
    ?>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    {{-- <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped nowrap" id="dataTable" width="100%" cellspacing="0"
                style="text-align: center">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Discount (%)</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><input class="delete" type="button" value="X"></th>
                        <th>Id</th>
                        <th>Discount (%)</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Quantity</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($promotion as $item)
                    <tr class="product_show_"> 
                        <td><input class="123" type="checkbox" value=""></td>
                        <td>{{$item->id}}</td>
                        <td>{{$item->percent}}</td>
                        <td>{{date("d-m-Y", strtotime($item->start_time))}}</td>
                        <td>{{date("d-m-Y", strtotime($item->end_time))}}</td>
                        <td>{{$item->numberPromotion}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<script src="{{asset('Admin/vendor/jquery/jquery.min.js')}}"></script>

<script>
    // $(document).ready(() => {
    //     $('.delete').click((e) => {
    //         var ids = [];
            
    //         $('.123:checked').each(function(){
    //             if ( $(this).val() ) {
    //                 ids.push ($(this).val());
    //             }
    //         });

    //         $.ajax({
    //            url: "{{route('delete-p')}}",
    //            method: "get",
    //            data:{
    //                 id: ids,
    //            },
    //            success: 
    //                 (res) =>{
    //                     res.data.forEach(element => {
    //                     $('.product_show_'+ element).fadeOut(1000);
    //                 })
    //            }
    //         });
    //     });
    // })
</script>