@extends('frontend.main_master')

@section('main')

	<!-- Faq Banner Section -->
    <section class="faq-banner-section" style="background-image:url(images/background/9.jpg);">
        <div class="auto-container">
            <h1>Gallery</h1>
        </div>
    </section>
    <!--End Faq Banner Section -->
	
	
	<section class="business-section my-2">
        <div class="auto-container">
            <div class="row clearfix">
    
                @php
                    $about = \App\Models\About::find(1);
                @endphp
    
    
                <!-- Image Column -->
                @foreach($all_data as $data)
                <div class="image-column col-lg-2 col-md-3 col-sm-4 mb-5 gallery_img">
                    <div class="inner-column">
    
                        <!-- Image Gallery -->
                        <div class="images-gallery">
                            <!-- Image One -->
                            <div class="image image-one">
                                <a href="{{ URL::to($data->image) }}" data-fancybox="business" data-caption="" class=""><img src="{{ URL::to($data->image) }}" alt="" class="img-thumbnail"></a>
                            </div>
                        </div>
    
                    </div>
                </div>
                @endforeach

    
            </div>
        </div>
    </section>


    @php
        $all_service = \App\Models\Service::latest()->limit(27)->get();
    @endphp
    <!-- Services Section Two -->
    <section class="services-section-two">
    <div class="auto-container">

    <!-- Sec Title -->
    <div class="sec-title centered">
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

@endsection
