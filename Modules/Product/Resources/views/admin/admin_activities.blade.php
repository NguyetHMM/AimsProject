@extends('layout.admin')
@section('admin-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ml-5">Product action history</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped nowrap" id="dataTable" width="100%" cellspacing="0"
                style="text-align: center">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Admin name</th>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Time action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>Admin name</th>
                        <th>Product name</th>
                        <th>Description</th>
                        <th>Time action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($admin as $key => $value)
                    <tr>
                        <th>{{$value->id}}</th>
                        <th>{{$value->name}}</th>
                        <th>{{$value->title}}</th>
                        <th>{{$value->description}}</th>
                        <th>{{date("d-m-Y H:i:s", strtotime($value->timeCreated))}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection