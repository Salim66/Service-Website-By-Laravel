@extends('frontend.main_master')

@section('main')

 @include('frontend.body.hero')

 @php
     $all_service = \App\Models\Service::latest()->limit(27)->get();
 @endphp
<!-- Services Section Two -->
<section class="services-section-two">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="title">What We Do</div>
            <h2>Main Services</h2>
        </div>

        <div class="services-carousel owl-carousel owl-theme">

            <!-- Services Block -->
            @foreach($all_service as $data)
            <div class="services-block-two">
                <div class="inner-box">
                    <div class="image">
                        <img src="{{ URL::to($data->image) }}" alt="" />
                        <!-- Heading Box -->
                        <div class="heading-box">
                            <h4>{{ $data->category->category_name }}</h4>
                        </div>
                        <!-- Overlay Box -->
                        <div class="overlay-box">
                            <div class="overlay-inner">
                                <h3><a href="{{ route('service-details',$data->title_slug) }}">{{ $data->category->category_name }}</a></h3>
                                <div class="text">{!! Str::words(htmlspecialchars_decode($data->description), 22, '...') !!}</div>
                                <a class="read-more" href="{{ route('service-details',$data->title_slug) }}"><span class="arrow left flaticon-next-7"></span> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>
<!-- End Services Section Two -->


<section class="business-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <h2>Dedicated consultant <br> provide solutions in three basic areas <span>Business</span></h2>
                    <div class="text">Consoul is a leading consulting and training firm in the area of project man-agement, active in the marketplace since 1997. Our mission is to provide complex improvement in the level and culture of project management, as a means of across the board improvement.</div>

                    <!-- Play Box -->
                    <div class="play-box">
                        <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image play-icon wow bounceIn animated" data-wow-delay="0ms" data-wow-duration="1500ms" style="background-image: url(&quot;images/resource/play-image.jpg&quot;); visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: bounceIn;"><span class="play-btn flaticon-play-button"></span></a>
                        Ervin Dexter <br><span>Chief Financial Officer</span>
                    </div>

                    <!-- More Box -->
                    <div class="more-about">
                        <a class="about" href="about.html">More About Company <span class="arrow flaticon-next-7"></span></a>
                    </div>

                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Pattern Layouts -->
                    <div class="pattern-layouts">
                        <div class="pattern-1"></div>
                        <div class="pattern-2"></div>
                        <div class="pattern-3"></div>
                    </div>

                    <!-- Image Gallery -->
                    <div class="images-gallery">
                        <!-- Image One -->
                        <div class="image image-one">
                            <a href="images/resource/business.jpg" data-fancybox="business" data-caption="" class=""><img src="{{ asset('frontend/') }}/images/resource/business.jpg" alt=""></a>
                        </div>
                        <!-- Image Two -->
                        <div class="image image-two">
                            <a href="images/resource/business-1.jpg" data-fancybox="business" data-caption="" class=""><img src="{{ asset('frontend/') }}/images/resource/business-1.jpg" alt=""></a>
                        </div>
                        <!-- Image Three -->
                        <div class="image image-three">
                            <a href="images/resource/business-2.jpg" data-fancybox="business" data-caption="" class=""><img src="{{ asset('frontend/') }}/images/resource/business-2.jpg" alt=""></a>
                        </div>
                        <!-- Image Four -->
                        <div class="image image-four">
                            <a href="images/resource/business-3.jpg" data-fancybox="business" data-caption="" class=""><img src="{{ asset('frontend/') }}/images/resource/business-3.jpg" alt=""></a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- News Section -->
<section class="news-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title">
            <div class="clearfix">
                <div class="pull-left">
                    <div class="title">News & Updates</div>
                    <h2>Latest From Blog</h2>
                    <div class="text">Our goal is to help our companies maintain or achieve best- in-class positions in their <br> respective industries and our team works.</div>
                </div>
                <div class="pull-right">
                    <a href="{{ route('blog') }}" class="theme-btn btn-style-four"><i>More News</i> <span class="arrow flaticon-next-8"></span></a>
                </div>
            </div>
        </div>

        @php
            $posts = \App\Models\Post::latest()->limit(3)->get();
        @endphp

        <div class="row clearfix">

            <!-- News Block -->
            @foreach ($posts as $data)
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

    </div>
</section>
<!-- End News Section -->

@include('frontend.body.newsleter')

@include('frontend.body.spnsor')

@endsection
