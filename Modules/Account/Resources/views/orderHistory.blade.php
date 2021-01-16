@extends('layout.personalInfor')

@section('personalInfor')
    <!-- orders history -->
    <div class="table-content table-responsive">
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Date</th>
                    <th>State</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (count($orders) > 0)
                    @foreach ($orders as $key => $value)
                        <tr>
                            <td>
                                {{ $key + 1 }}
                            </td>
                            <td>{{ $value->orderDate }}</td>
                            <td class="{{ 'state-' . $value->id }}">{{ $value->name }}</td>
                            <td><a href="{{ route('orderDetails', ['orderID' => $value->id])}}">Show details</a></td>
                            <td><a style="cursor: pointer" onclick="cancel({{ $value->id }})"><strong style="color: red"
                                        class="cancel">Cancel</strong></a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">
                            <h3>Empty Order History</h3>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection

<style>
    .cancel:hover {
        color: black !important;
    }

</style>

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
                        url: "{{ route('cancel') }}",
                        method: "get",
                        data: {
                            id: id,
                        },
                        success: (response) => {
                            $(".state-" + id).html(response.data);
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
