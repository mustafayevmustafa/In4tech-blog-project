@extends('user.layout')

@if($blog)
@section('content')

@include('user.include.header', ['slider' => $blog->slider, 'is_header' => false])
    <!-- Main Content-->
<div class="container px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        
    {{ $blog -> content }}
       


        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
    </div>
</div>

    </div>
@endsection
@else
<h1 class="text-center">There is no info at Server</h1>
@endif