@extends('frontend.main_master')

@section('main')
<!--Page Title-->
<section class="page-title" style="background-image:url(/frontend/images/background/8.jpg);">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>{{ $data->category->category_name }}</h1>
            </div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="services.html">services</a></li>
                    <li>Service Single</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Sidebar Page Container -->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">

            <iframe src="{{ URL::to($data->file) }}" frameborder="0"></iframe>

        </div>
       
    </div>
    <div class="text-center">
        <a class="service_download_btn m-auto" href="{{ url('/') }}">Back Home</a>
    </div>
</div>


@endsection
