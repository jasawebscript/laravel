@extends('layouts.course-landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list course-landing web-developer'])

@section('content')
    <div class="main">
        <div class="container top">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 main-content">
                    <div class="col-xs-12 col-sm-12 col-md-12  video-wrapper">
                        <div class="content front-content" id="content">
                            <div class="video-container">
                                <div class="container-fluid communicate">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-10 col-md-push-1 text-center">
                                            <h6>BitDegree Program</h6>
                                                <h1>Become a Full Stack Web Developer</h1>
                                                <p class="subtitle" style="color:#fff;">Get the skills to work with both back-end and front-end technologies Learn to develop a solid foundation for working with servers and host configurations, perform database integrations, and troubleshoot front-end development issues. Master course to become a Full Stack Web Developer.</p>
                                                <p>Enroll by <b>January, 2018</b></p>
                                        </div>
                                        @include('partials.sign-up-for-web-development')
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
                </div>
            </div>
            <div class="course-summary">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-4 course-summary-part">
                            <h5>Time</h5>
                            <h4>5 months</h4>
                        </div>
                        <div class="col-md-4 course-summary-part">
                            <h5>Classroom Opens</h5>
                            <h4>January, 2018</h4>
                        </div>
                        <div class="col-md-4 course-summary-part">
                            <h5>Scholarship</h5>
                            <h4>30 tokens</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.collaboration-with')

    <div class="main light-violet-bkg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                    <div class="title-container">
                        <h2 class="title">Why take this course?</h2>
                        <h3 class="subtitle">Full-stack web developer job openings are up 50%</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 description">
                    <div class="image-container text-center">
                            <img src="{{ asset_rev('full-stack-developer.png') }}" alt="">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 description">
                    <div class="description-container">
                        <p>In this program, you’ll gain the skills needed to develop world-class Virtual Reality content. You’ll master the core principles of full-stack web development, learn with hands-on experience, and transform from a simple developer to become a Full Stack Developer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="main container-fluid communicate light-violet-bkg cta-block bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                    <h2 class="title">@lang('signup.title')</h2>
                    <p class="subtitle">@lang('signup.subtitle')</p>
                </div>
                @include('partials.sign-up-for-web-development')
                <div class="text-center">
                    @include('partials.contact-icons')
                </div>
            </div>
        </div>
    </div>


@endsection
