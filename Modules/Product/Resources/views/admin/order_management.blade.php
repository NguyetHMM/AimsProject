@extends('layout.admin')
@section('admin-content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ml-5">Order Management</h1>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped nowrap" id="dataTable" width="100%" cellspacing="0"
                style="text-align: center">
                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Buyers</th>
                        <th>States</th>
                        <th>Address</th>
                        <th>Order date</th>
                        <th>Ship fee ($)</th>
                        <th>Show</th>
                        <th>Cancel</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Serial</th>
                        <th>Buyers</th>
                        <th>States</th>
                        <th>Address</th>
                        <th>Order date</th>
                        <th>Ship fee ($)</th>
                        <th>Show</th>
                        <th>Cancel</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($orders as $key => $value)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->user_name}}</td>
                        @if($value->stateID == 1)
                        <td><p class="alert alert-primary {{ 'state-' . $value->id }}">{{$value->state_name}}</p></td>                       
                        @elseif($value->stateID == 2)
                        <td><p class="alert alert-success">{{$value->state_name}}</p></td>  
                        @else
                        <td><p class="alert alert-danger">{{$value->state_name}}</p></td>  
                        @endif
                        <td>{{$value->addressID}}</td>
                        <td>{{date("d-m-Y", strtotime($value->orderDate))}}</td>
                        <td>{{$value->shipfee}}</td>
                        <td><a href="{{ route('orderDetail', ['orderID' => $value->id])}}" style="text-decoration: underline">Show details</a></td>
                        @if ($value->stateID == 1)
                            <td><button type="button" class="btn btn-danger btn-circle" onclick="cancel({{ $value->id }})"><i class="fas fa-trash"></i></button></td>
                        @else
                            <td><button type="button" class="btn btn-danger btn-circle" disabled><i class="fas fa-trash"></i></button></td>
                        @endif
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

<script>
    function cancel(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(document).ready(() => {
                    $.ajax({
                        url: "{{ route('cancelOrder') }}",
                        method: "get",
                        data: {
                            id: id,
                        },
                        success: (response) => {
                            $(".state-" + id).html(response.data);
                            $(".state-" + id).removeClass("alert-primary");
                            $(".state-" + id).addClass("alert-danger");
                            console.log(response);
                            Swal.fire(
                                'Cancelled Succesfully!',
                                '',
                                'success'
                            )
                        },
                        error: (response) => {
                            Swal.fire(
                                'Cancelled Error!',
                                '',
                                'error'
                            )
                        }
                    });
                });
            }
        })
    }
</script>