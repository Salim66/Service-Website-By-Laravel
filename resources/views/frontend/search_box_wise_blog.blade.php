@extends('frontend.main_master')

@section('main')

<!--Page Title-->
<section class="page-title" style="background-image:url(/frontend/images/background/8.jpg);">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>{{ $search }}</h1>
            </div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Our Blogs</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Our Blogs Section -->
<section class="our-blogs-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- News Block -->
            @foreach($all_data as $data)
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="image">
                        <div class="post-date">{{ date('d M', strtotime($data->created_at)) }}</div>
                        <img src="{{ URL::to($data->image) }}" alt="" />
                        <a href="{{ route('single.blog', $data->title_slug) }}" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                    </div>
                    <div class="lower-content">
                        <ul class="post-info">
                            <li><span class="icon flaticon-user"></span>By <strong>{{ $data->user->name }}</strong></li>
                            <li>{{ $data->postCategory->post_category_name }}</li>
                        </ul>
                        <h3><a href="{{ route('single.blog', $data->title_slug) }}">{{ $data->title }}</a></h3>
                        <a class="read-more" href="{{ route('single.blog', $data->title_slug) }}"><span class="arrow left flaticon-next-7"></span> Read More <span class="arrow right flaticon-next-7"></span></a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        
        <!--Post Share Options-->
        <div class="styled-pagination text-center">
            {{ $all_data->links('frontend.paginator') }}
        </div>
        
    </div>
</section>
<!-- End Our Blogs Section -->

@endsection
