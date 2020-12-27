@extends('layout.admin')
@section('admin-content')
@foreach ($product as $item)
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-5">{{$item->title}} - {{$item->category_name}} - {{$item->type_name}}</h1>
</div>
<div class="container" style="color: black">
    <h4></h4>
    @foreach ($kind as $item)
    <h4>Product Kind: {{$item->name}} </h3>    
    @endforeach
    
</div>
<div class="row">
    
</div>
@endforeach
@endsection
