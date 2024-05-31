{{-- Layouts: --}}
@extends('Front.layouts.layout')


{{-- Spesific CSS/JS includes: --}}
@section('headerCssJs')
    {{--<link rel="stylesheet" href="{{ asset('css/index.css') }}">--}}
@endsection

{{-- Header Content: --}}
@section('slider')
    <header class="masthead" style="background-image: url('{{asset('img/blog/' . $blogData->image)}}');">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h2>{{$blogData->title}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

{{-- Main Content Section: --}}
@section('mainContent')
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {!! $blogData->content !!}
                </div>
            </div>
        </div>
    </article>
@endsection


{{-- Spesific Footer JS includes: --}}
@section('footerJS')
    {{--<script src="{{ asset('js/index.js') }}"></script>--}}
@endsection
