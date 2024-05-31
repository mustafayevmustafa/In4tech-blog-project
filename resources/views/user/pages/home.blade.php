@extends('user.layout')

@if($slider)
@section('content')

@include('user.include.header',['slider' => $slider, 'is_header' => true])
    <!-- Main Content-->
<div class="container px-4 px-lg-5">
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        <!-- Post preview-->
        @foreach($blogs as $blog)
        <div class="post-preview">
            <a href="/blogs/{{ $blog -> id }}">
                <h2 class="post-title">{{$blog->title}}</h2>
                <h3 class="post-subtitle">{{Str::limit($blog->content, 30,'...')}}</h3>
            </a>
            <p class="post-meta">
                Posted by
                <a href="#!">Start Bootstrap</a> on
{{--                on September 24, 2023--}}
                {{date_format($blog->created_at,'M d, Y')}}
                <br>
                <span class="text-info">{{$blog->category->title}}</span>
            </p>
        </div>
            <!-- Divider-->
            <hr class="my-4" />
        @endforeach


        <!-- Pager-->
        <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
    </div>
</div>

    </div>
@endsection
@else
<h1 class="text-center">There is no info at Server</h1>
@endif