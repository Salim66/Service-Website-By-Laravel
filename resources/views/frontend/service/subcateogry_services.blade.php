@extends('frontend.main_master')

@section('main')
<!--Page Title-->
<section class="page-title" style="background-image:url(/frontend/images/background/8.jpg);">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>{{ $subcategory->subcategory_name }}</h1>
            </div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- Services Section-->
<section class="services-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- Services Block -->
            @foreach($all_data as $data)
            <div class="services-block style-two col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <img src="{{ URL::to($data->image) }}" alt="" />
                        <a href="{{ route('service-details',$data->title_slug) }}" class="overlay-link"></a>
                    </div>
                    <div class="lower-content">
                        <a href="{{ route('service-details',$data->title_slug) }}" class="category">{{ $data->category->category_name }}</a>
                        <div class="text">{!! Str::words(htmlspecialchars_decode($data->description), 22, '...') !!}</div>
                        <a class="read-more" href="{{ route('service-details',$data->title_slug) }}"><span class="arrow left flaticon-next-7"></span> Read More <span class="arrow right flaticon-next-7"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        
        
    </div>
</section>
<!--End Services Section-->


@endsection