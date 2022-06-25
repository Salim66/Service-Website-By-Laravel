@extends('frontend.main_master')

@section('main')

<!--Page Title-->
<section class="page-title style-two" style="background-image:url(/frontend/images/background/8.jpg);">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h1>Blog Detail</h1>
            </div>
            <div class="pull-right">
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li>blog Detail</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!-- Sidebar Page Container -->
<div class="sidebar-page-container style-two">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- Content Side / Blog Single -->
            <div class="content-side col-lg-8 col-md-12 col-sm-12">
                <div class="blog-single">
                    <div class="inner-box">
                        <!-- Title Box -->
                        <div class="image">
                            <img src="{{ URL::to($data->image) }}" alt="" />
                        </div>
                        <div class="title-box">
                            <div class="post-date">{{ date('d M', strtotime($data->created_at)) }}</div>
                            <div class="category">{{ $data->postCategory->post_category_name }}</div>
                            <h2>{{ $data->title }}</h2>
                        </div>
                        <div class="lower-content">
                            <div class="text">
                                {!! htmlspecialchars_decode($data->description) !!}
                            </div>
                            <!--post-share-options-->
                            <div class="post-share-options">
                                <div class="post-share-inner clearfix">
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            
                    <!--Comments Area-->
                    <div class="comments-area">
                        <div id="disqus_thread"></div>
                            <script>
                                (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://service-14.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                                })();
                            </script>
                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    </div>
                    
                </div>
            </div>
            
            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                <aside class="sidebar">
                    <div class="sidebar-inner">
                        
                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <form method="post" action="{{ route('search.blog') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="search" name="search" value="" placeholder="Your Keyword. . ." required>
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>
                        @php
                            $categories = \App\Models\PostCategory::withCount('posts')->get();
                        @endphp
                        <!-- Categories Widget -->
                        <div class="sidebar-widget categories-widget">
                            <div class="sidebar-title">
                                <h2>Categories</h2>
                            </div>
                            <div class="widget-content">
                                <ul class="blog-cat">
                                    @foreach($categories as $category)
                                    <li><a href="{{ route('category.wise.blog', $category->post_category_slug) }}">{{ $category->post_category_name }} <sup>{{ $category->posts_count }}</sup></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                         
                        @php
                            $popular_post = \App\Models\Post::latest()->inRandomOrder()->limit(3)->get();
                        @endphp
                        <!-- Post Widget -->
                        <div class="sidebar-widget post-widget">
                            <div class="sidebar-title">
                                <h2>Popular Post</h2>
                            </div>
                            <div class="widget-content">
                                
                                @foreach($popular_post as $p_data)
                                <!-- News Post -->
                                <div class="news-post">
                                    <div class="post-inner">
                                        <div class="image">
                                            <img src="{{ URL::to($p_data->image) }}" alt= ""/>
                                            <a href="{{ route('single.blog', $p_data->title_slug) }}" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                        </div>
                                        <div class="lower-content">
                                            <div class="category"><span class="fa fa-folder-o"></span>{{ $p_data->postCategory->post_category_name }}</div>
                                            <h4><a href="{{ route('single.blog', $p_data->title_slug) }}">{{ $p_data->title }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        
                        
                        <!-- Gallery Widget -->
                        <div class="sidebar-widget gallery-widget">
                            <div class="sidebar-title">
                                <h2>Gallery</h2>
                            </div>
                            <div class="widget-content">
                                <div class="gallery-outer">
                                    <div class="clearfix">
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-1.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-2.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-3.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-4.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-5.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-6.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-7.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-8.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                        <!-- Image -->
                                        <div class="image">
                                            <div class="image-inner">
                                                <img src="{{ URL::to('frontend/') }}/images/gallery/thumb-9.jpg" alt= ""/>
                                                <a href="project-single.html" class="overlay-link"><span class="icon flaticon-chain"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </aside>
            </div>
            
        </div>
    </div>
</div>

@endsection
