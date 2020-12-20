@extends('layout.admin')
@section('admin-content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Show Products</h1>
{{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
        DataTables documentation</a>.</p> --}}
    <?php
        $message = Session::get('message');
        if($message){
            echo '<span class="text-alert" style="color:green; border: 1px solid green">'.$message.'</span>';
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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Title</th>
                        <th>Product Category</th>
                        <th>Product Type</th>
                        <th>Value (vnđ)</th>
                        <th>Price (vnđ)</th>
                        <th>Language</th>
                        <th>Promotion (%)</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Product ID</th>
                        <th>Title</th>
                        <th>Product Category</th>
                        <th>Product Type</th>
                        <th>Value (vnđ)</th>
                        <th>Price (vnđ)</th>
                        <th>Language</th>
                        <th>Promotion (%)</th>
                        <th>Edit</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($product as $key)
                    <tr>
                        <td>{{$key->id}}</td>                        
                        <td>{{$key->title}}</td>                        
                        <td>{{$key->category_name}}</td>                        
                        <td>{{$key->type_name}}</td>
                        <td>{{$key->value}}</td>
                        <td>{{$key->price}}</td>
                        <td>{{$key->language}}</td>
                        <td>{{$key->percent}}</td>
                        <td>Sửa/xóa</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection