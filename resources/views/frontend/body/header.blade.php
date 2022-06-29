<header class="main-header">
    @include('frontend.body.top_header')

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="inner-container">
            <div class="auto-container clearfix">
                <div class="logo-outer">
                    <div class="logo"><a href="{{ url('/') }}"><img src="{{ asset('frontend/') }}/images/logo.png" alt="" title=""></a></div>
                </div>

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="navbar-header">
                            <!-- Togg le Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu"></span>
                            </button>
                        </div>

                        

                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">

                                <li><a href="{{ route('about.us') }}">About Us</a></li>

                                @php
                                    $categories = \App\Models\Category::limit(3)->get();
                                @endphp

                                <li class="dropdown"><a href="javascipt:void(0)">Services</a>
                                    <ul>
                                        @foreach($categories as $category)
                                            <li class="dropdown"><a href="{{ url('/category/services/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a>

                                                <ul>
                                                    @php
                                                            $subcategories = App\Models\SubCategory::where('category_id', $category->id)->orderBy('subcategory_name', 'ASC')->get();
                                                    @endphp

                                                    @foreach($subcategories as $sub)
                                                        <li class="dropdown"><a href="{{ url('/subcategory/services/'.$sub->id.'/'.$sub->subcategory_slug) }}">{{ $sub->subcategory_name }}</a>

                                                            <ul>
                                                                @php
                                                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id', $sub->id)->orderBy('subsubcategory_name', 'ASC')->get();
                                                                @endphp
                
                                                                @foreach($subsubcategories as $subsub)
                                                                <li><a class="dropdown_last" href="{{ url('/subsubcategory/services/'.$subsub->id.'/'.$subsub->subsubcategory_slug) }}">{{ $subsub->subsubcategory_name }}</a></li>
                                                                @endforeach
                                                            </ul>

                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </li>
                                        @endforeach

                                        
                                    </ul>
                                </li>

                               
                                <li><a href="{{ route('our.capabilities') }}">Our Capabilities</a></li>
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                                <li><a href="{{ route('gri.certified.training') }}">GRI Certified Training Partner</a></li>
                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    @php
                        $contract_us = \App\Models\ContactUs::findOrFail(1);
                    @endphp
                    <!-- Main Menu End-->
                    <div class="outer-box clearfix">
                       <!-- Button Box -->
                        {{-- <div class="btn-box">
                            <a href="contact.html" class="theme-btn btn-style-one"><span class="icon flaticon-phone-receiver"></span><i>{{ $contract_us->general_phone }}</i></a>
                        </div> --}}

                        <!-- Options Box -->
                        <div class="option-box clearfix">

                            {{-- <!-- Cart Button -->
                            <div class="cart-btn">
                                <a href="shop-single.html" class="flaticon-cart cart-icon"><span class="total-cart">0</span></a>
                            </div> --}}

                            <!--Search Box-->
                            <div class="search-box-outer">
                                <div class="dropdown">
                                    <button class="search-box-btn dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fa fa-search"></span></button>
                                    <ul class="dropdown-menu pull-right search-panel" aria-labelledby="dropdownMenu3">
                                        <li class="panel-outer">
                                            <div class="form-container">
                                                <form method="post" action="{{ route('search.service') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <input type="search" name="search" value="" placeholder="Search Here" required>
                                                        <button type="submit" class="search-btn"><span class="fa fa-search"></span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->

    @include('frontend.body.sticky_header')
</header>
