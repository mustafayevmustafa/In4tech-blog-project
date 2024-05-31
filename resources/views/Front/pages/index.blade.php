{{-- Layouts: --}}
@extends('Front.layouts.layout')

{{-- Spesific CSS/JS includes: --}}
@section('headerCssJs')
    {{--<link rel="stylesheet" href="{{ asset('css/index.css') }}">--}}
@endsection

{{-- Header Content: --}}
@section('slider')
    <header class="masthead" style="background-image: url('{{asset('img/sliders/' . $slider->image)}}');">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{$slider->title}}</h1>
                        <span class="subheading">{{$slider->content}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

{{-- Main Content Section: --}}
@section('mainContent')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach($blogDatas as $blogData)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{$blogData->slug}}" onclick="document.querySelector('.myForm-{{$blogData->id}}').submit(); return false;">
                            <h2 class="post-title">{!! Str::limit($blogData->title, 50, '..') !!}</h2>
                            <h3 class="post-subtitle">{!! Str::limit($blogData->content, 150, '....') !!}</h3>

                            <form class="myForm-{{$blogData->id}}" action="{{ route('blog.index', $blogData->slug) }}" method="POST">
                                @csrf
                                <input type="hidden" name="data" value="{{$blogData}}">
                                <!-- Form alanları buraya eklenebilir -->
                            </form>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on {{ $blogData->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4"/>
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                        Posts →</a></div>
            </div>
        </div>
    </div>
@endsection


{{-- Spesific Footer JS includes: --}}
@section('footerJS')
    {{--<script src="{{ asset('js/index.js') }}"></script>--}}
@endsection
