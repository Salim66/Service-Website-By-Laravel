@php
    $seo = \App\Models\Seo::findOrFail(1);
@endphp
<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <title>{{ $seo->meta_title }}</title>
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="keyword" content="{{ $seo->meta_keyword }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <!-- Google Analytics -->
    <script>
        {{ $seo->google_analytics }}
    </script>
    <!-- Stylesheets -->
    <link href="{{ asset('frontend/') }}/css/bootstrap.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('frontend/') }}/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/') }}/images/favicon.png" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link href="{{ asset('frontend/') }}/css/custom.css" rel="stylesheet">

    <!-- Share This -->
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=62b6a953c3c9a30019463f67&product=inline-share-buttons" async="async"></script>

    </head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>

    @include('frontend.body.header')

    @section('main')
    @show

    @include('frontend.body.footer')

</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<!--Scroll to top-->
<script src="{{ asset('frontend/') }}/js/jquery.js"></script>
<script src="{{ asset('frontend/') }}/js/popper.min.js"></script>
<script src="{{ asset('frontend/') }}/js/jquery-ui.js"></script>
<script src="{{ asset('frontend/') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('frontend/') }}/js/jquery.fancybox.js"></script>
<script src="{{ asset('frontend/') }}/js/owl.js"></script>
<script src="{{ asset('frontend/') }}/js/wow.js"></script>
<script src="{{ asset('frontend/') }}/js/jquery-ui.js"></script>
<script src="{{ asset('frontend/') }}/js/appear.js"></script>
<script src="{{ asset('frontend/') }}/js/script.js"></script>
</body>

</html>
