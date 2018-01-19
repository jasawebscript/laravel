<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>BitDegree ICO - Revolutionizing education with blockchain</title>

    @include('partials.tag-manager-head')

    <meta name="description" content="Join BitDegree ICO (Initial Coin Offerings). BitDegree - The world's first blockchain based free education platform with token scholarships & talent networking. Be the first to know about BitDegree Foundation Token Distribution & ICO event updates.">
    <meta name="keywords" content="ICO, initial coin offerings, bitdegree, ethereum, bitcoin, token, tokens, blockchain, learning foundation, scholarship, free education">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('partials.social-meta')

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:100,200,300,400,500,600,700,900|Work+Sans:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset_rev('css/'.($currentLanguage == 'ru' ? 'lang-ru.css' : 'default.css')) }}">
    <link href="{{ asset_rev('course_style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset_rev('jquery.mCustomScrollbar.min.css') }}">

    @include('partials.smartlook')
</head>

<body class="canvas lang-{{ $languages[$currentLanguage] }}" data-spy="scroll" data-target="#toc" style="">

@include('partials.tag-manager-body')

<div class="container-fluid">
    <div class="row-fluid">

        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar-offcanvas affix" id="sidebar">

            <div class="sidebar-nav">
                <div class="current-lesson">
                    <div class="back-arrow">
                        <a href="{{ $hasLanding ? route('course', ['course' => $courseKey]) : route('mvp') }}" title="Back">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </a>
                    </div>
                    @yield('currentStep')
                </div>

                <div class="lesson tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-folder-o" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                    </ul>
                </div>



                <div class="lessons-nav navbar mCustomScrollbar" role="navigation">

                    <div id="navbar" class="collapse navbar-collapse navbar-container">
                        @yield('steps')
                    </div>

                </div>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-content">
            <div class="col-xs-12 col-sm-12 col-md-12 header">
                <div class="container-fluid">
                    <div class="content text-center">
                        <h4>@yield('title')</h4>
                    </div>
                </div>
            </div>

            @if($isDemo ?? false)
            <div class="col-xs-12 col-sm-12 col-md-12  video-wrapper">
                <div class="content front-content" id="content">
                    <div class="video-container">
                        <div class="container-fluid communicate">
                            <div class="row">
                                <div class="col-xs-12 col-md-8 col-md-push-2 col-lg-10 col-lg-push-1 text-center">
                                    <h6>BitDegree Program</h6>
                                    @yield('courseHeader')
                                </div>
                                @include('partials.subscribe-block')
                            </div>
                        </div>

                        <div class="contain-video">
                            <div class="course-video">
                                <div class="course-video-overlay"></div>
                                <video  id="bgvid" poster="{{ asset_rev('bitdegree-vid-img.jpg') }}" class="hidden-xs hidden-sm" autoplay="" loop="" style="      width: auto; height: 100%;">
                                    <source src="{{ asset_rev('bitdegree_bg.mp4') }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <div class="lesson-content">
                    @yield('content')
                </div>
            @endif

            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="content front-content" id="lesson-content">
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.scripts')

<script src="{{ asset_rev('jquery.mCustomScrollbar.concat.min.js') }}" async></script>

<script>
    jqWait(function(){
        $(window).on("load",function(){

            $("a[rel='load-content']").click(function(e){
                e.preventDefault();
                var url=$(this).attr("href");
                $.get(url,function(data){
                    $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                    //scroll-to appended content
                    $(".content").mCustomScrollbar("scrollTo","h2:last");
                });
            });

            $(".content").delegate("a[href='top']","click",function(e){
                e.preventDefault();
                $(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
            });

        });
    });
</script>

<script>
    jqWait(function(){
        $(window).on("load resize",function(){
            var selector=".lessons-nav", //your element(s) selector
                cssFlag=window.getComputedStyle(document.querySelector(selector),":after").getPropertyValue("content").replace(/"/g,'');
            if(cssFlag){
                $(selector).mCustomScrollbar({ /* scrollbar options */ });
            }else{
                $(selector).mCustomScrollbar("destroy");
            }
        });
    });
</script>


</body>

</html>