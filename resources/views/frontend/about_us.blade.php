@extends('frontend.main_master')

@section('main')

<!--Page Title-->
<section class="page-title" style="background-image:url(/frontend/images/background/8.jpg);">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>About Us</h1>
            </div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>About us</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- We Are Section -->
<section class="we-are-section">
    <div class="auto-container">
        <!-- Big Image -->
        <div class="big-image">
            <img src="{{ URL::to($data->image) }}" alt ="" />
        </div>
        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="title">Who we Are</div>
            <h2>{{ $data->title }}</h2>
        </div>
        
        <div class="row clearfix">
            
            <!-- Content Column -->
            <div class="content-column col-lg-12 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="text">
                        {!! htmlspecialchars_decode($data->description) !!}
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</section>
<!-- End We Are Section -->

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
