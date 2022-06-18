<header class="main-header">
    @include('frontend.body.top_header')

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="inner-container">
            <div class="auto-container clearfix">
                <div class="logo-outer">
                    <div class="logo"><a href="index.html"><img src="{{ asset('frontend/') }}/images/logo.png" alt="" title=""></a></div>
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

                                <li class="dropdown"><a href="#">About us</a>
                                    <ul>
                                        <li><a href="about.html">About Company</a></li>
                                        <li><a href="faq.html">FAQ’s</a></li>
                                        <li><a href="clients.html">Our Clients</a></li>
                                        <li><a href="price.html">Pricing & Plans</a></li>
                                        <li><a href="testimonial.html">Testimonials</a></li>
                                        <li><a href="not-found.html">404 Page</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Services</a>
                                    <ul>
                                        <li><a href="services.html">Services</a></li>
                                        <li><a href="advance-analytics.html">Advanced Analytics</a></li>
                                        <li><a href="corporate-finance.html">Corporate Finance</a></li>
                                        <li><a href="customer-marketing.html">Customer Marketing</a></li>
                                        <li><a href="information-technology.html">Information Technology</a></li>
                                        <li><a href="social-marketing.html">Social Marketing</a></li>
                                        <li><a href="private-equity.html">Private Equity</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Projects</a>
                                    <ul>
                                        <li><a href="projects.html">Project 3 Column</a></li>
                                        <li><a href="project-3-column.html">3 Columns Modern</a></li>
                                        <li><a href="project-4-column.html">4 Columns Modern</a></li>
                                        <li><a href="project-masonry.html">Masonry Style 01</a></li>
                                        <li><a href="project-masonry-2.html">Masonry Style 02</a></li>
                                        <li><a href="project-single.html">Single Project</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Blog Default</a></li>
                                        <li><a href="blog-sidebar.html">Blog Large With Sidebar</a></li>
                                        <li><a href="blog-single.html">Blog Single Post</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Shop</a>
                                    <ul>
                                        <li><a href="shops.html">Our Products</a></li>
                                        <li><a href="shop-single.html">Product Single</a></li>
                                        <li><a href="shoping-cart.html">Shopping Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="account.html">My Account</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact.us') }}">Contact</a></li>
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
                        <div class="btn-box">
                            <a href="contact.html" class="theme-btn btn-style-one"><span class="icon flaticon-phone-receiver"></span><i>{{ $contract_us->general_phone }}</i></a>
                        </div>

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
                                                <form method="post" action="http://st.ourhtmldemo.com/new/consoul/blog.html">
                                                    <div class="form-group">
                                                        <input type="search" name="field-name" value="" placeholder="Search Here" required>
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
