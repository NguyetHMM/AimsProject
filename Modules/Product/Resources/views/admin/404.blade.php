@extends('layout.admin')
@section('admin-content')
<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <a href="{{route('admin-index')}}">&larr; Back to Dashboard</a>
    </div>

</div>
@endsection