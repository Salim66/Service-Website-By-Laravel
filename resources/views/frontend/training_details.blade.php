@extends('frontend.main_master')

@section('main')
<!--Page Title-->
<section class="page-title" style="background-image:url(/frontend/images/background/8.jpg);">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>{{ $data->trainingCategory->training_category_name }}</h1>
            </div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="services.html">Training</a></li>
                    <li>Training Single</li>
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
                            $categories = \App\Models\TrainingCategory::all();
                        @endphp

                        <!-- Categories Widget -->
                        <div class="sidebar-widget Training-widget">
                            <div class="Traininget-content">
                                <ul class="blog-cat-three">
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('category.wise.training', $category->training_category_slug) }}">{{ $category->training_category_name }}</a></li>
                                    @endforeach
                                </ul>
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

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@php
    $relative_training = \App\Models\Training::where('training_category_id', $data->training_category_id)->get();
@endphp
<!-- Services Section-->
<section class="services-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- Services Block -->
            @foreach($relative_training as $data)
            <div class="services-block style-two col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image">
                        <img src="{{ URL::to($data->image) }}" alt="" />
                        <a href="{{ route('training-details',$data->title_slug) }}" class="overlay-link"></a>
                    </div>
                    <div class="lower-content">
                        <a href="{{ route('training-details',$data->title_slug) }}" class="category">{{ $data->trainingCategory->training_category_name }}</a>
                        <div class="text">{!! Str::words(htmlspecialchars_decode($data->description), 22, '...') !!}</div>
                        <a class="read-more" href="{{ route('training-details',$data->title_slug) }}"><span class="arrow left flaticon-next-7"></span> Read More <span class="arrow right flaticon-next-7"></span></a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
        
        
    </div>
</section>
<!--End Services Section-->


@endsection
