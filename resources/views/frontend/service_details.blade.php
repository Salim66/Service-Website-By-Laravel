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

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <div class="left-sidebar">

                        @php
                            $categories = \App\Models\Category::all();
                        @endphp

                        <!-- Categories Widget -->
                        <div class="sidebar-widget services-widget">
                            <div class="widget-content">
                                <ul class="blog-cat-three">
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('category.wise.service', $category->category_slug) }}">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget broucher-widget">
                            <div class="widget-content">
                                
                                <!-- Broucher Box -->
                                @if(!empty($data->file) || $data->file != null)
                                <div class="broucher-box">
                                    <div class="broucher-inner">
                                        <a href="{{ route('download-service-pdf',$data->id) }}" class="overlay-link"></a>
                                        <div class="content">
                                            <div class="icon flaticon-pdf-2"></div>
                                            <h3>Detailed Service Pack</h3>
                                            <div class="file">Download PDF</div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                            </div>
                        </div>

                        <!-- Quote Widget -->
                        <div class="sidebar-widget quote-widget">
                            <div class="widget-content">
                                <form action="{{ route('date-search') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                 <label for="" class="service_date_l">Start Date</label>
                                                 <input type="date" name="start_date" class="form-control">
                                             </div>
                                        </div><br>
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                 <label for="" class="service_date_l">End Date</label>
                                                 <input type="date" name="end_date" class="form-control">
                                             </div>
                                        </div>
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                 <button class="district_button" type="submit">Search</button>
                                             </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        

                    </div>
                </aside>
            </div>

            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="services-single">
                    <div class="inner-box">
                        <h2>{{ $data->title }}</h2>
                        <div class="text">
                            <!-- Graph Content -->
                            <div class="graph-content">
                                <div class="row clearfix">
                                    <div class="column col-lg-12 col-md-12 col-sm-12">
                                        <div class="image">
                                            <img src="{{ URL::to($data->image) }}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {!! htmlspecialchars_decode($data->description) !!}



                        </div>

                        <!--Services Info Tabs-->
                        <div class="product-info-tabs">
                            {{-- <!--Services Tabs-->
                            @if(session()->has('error_message'))
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                {{ session()->get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            @endif --}}
                            {{-- <div class="service-tabs tabs-box">

                                <!--Tab Btns-->
                                @if(!empty($data->file) || $data->file != null)
                                <a class="service_download_btn" href="{{ route('download-service-pdf',$data->id) }}">Download Details</a>
                                @endif
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@php
    $relative_services = \App\Models\Service::where('category_id', $data->category_id)->get();
@endphp
<!-- Services Section-->
<section class="services-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- Services Block -->
            @foreach($relative_services as $data)
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
