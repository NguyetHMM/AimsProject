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
            {{-- @foreach ($product_details as $key => $item) --}}
            <tr>
                <td>
                    1
                </td>
                <td>Title alkjsdlkajdslkajsd</td>
                <td>Completed</td>
                <td><a href="">Show details</a></td>
                <td><a href=""><strong style="color: red" class="cancel">Cancel</strong></a></td>
                {{-- <input type="hidden" name="{{ 'hidden_product'.$key }}" value="{{$item->id}}"> --}}
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection

<style>
    .cancel:hover{
        color: black !important;
    }
</style>
