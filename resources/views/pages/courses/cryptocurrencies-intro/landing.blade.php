@extends('layouts.course-landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list course-landing smart-contract-developer'])

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
                                            <h1>Introduction to Crypto and Cryptocurrencies</h1>
                                            <p class="subtitle">This course will consist of 8 lectures covering all the basics that you need to know about the cryptocurrency world. By the end of this course you will understand what cryptocurrencies are, how they work, why they have value and how to use them. Furthermore, you will receive a checklist so that you can analyze any other crypto token in the world.</p>
                                            <p><strong>BETA Available Now</strong></p>
                                            <p>Sponsored by <a href="https://ethos.io" target="_blank" style="color:#fff;">Ethos.io</a></p>
                                            <a href="{{ route('lesson', [$course['key'], 'intro']) }}" class="btn btn-primary c2a">Start Course</a>
                                        </div>
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
                            <h5>Lectures</h5>
                            <h4>8</h4>
                        </div>
                        <div class="col-md-4 course-summary-part">
                            <h5>Classroom Opens</h5>
                            <h4>Open now</h4>
                        </div>
                        <div class="col-md-4 course-summary-part">
                            <h5>Scholarship</h5>
                            <h4>TBA</h4>
                        </div>
                    </div>
                </div>
            </div>

            @if(isset($course['lessons']))
                <div class="course-syllabus">
                    <h2>Requirements</h2>
                    <p>There are no special requirements for this course.</p>
                    <h2>Description</h2>
                    <p>This course will consist of 8 lectures covering all the basics that you need to know about the cryptocurrency world. By the end of this course you will understand what cryptocurrencies are, how they work, why they have value and how to use them. Furthermore, you will receive a checklist so that you can analyze any other crypto token in the world. </p>
                    <h2>Curriculum For This Course</h2>
                    <div class="list-group lessons">
                        @foreach($course['lessons'] as $index => $lesson)
                            <a class="list-group-item" role="button" data-toggle="collapse" href="#lesson-{{ $index }}" aria-expanded="false" aria-controls="lesson-{{ $index }}">
                                Lecture {{ $index + 1 }}: {{ $lesson['title'] }}
                            </a>
                            <div class="collapse list-group materials" id="lesson-{{ $index }}">
                                @foreach($lesson['materials'] as $material)
                                    <div class="list-group-item material-{{ $material['type'] }}">
                                        <i class="fa"></i>
                                        {{ $material['title'] }}
                                        @if(isset($material['duration']))
                                            <div class="text-muted pull-right">{{ nice_duration($material['duration']) }}</div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include('partials.collaboration-with', ['sponsor' => 'ethos'])


    <div class="main container-fluid communicate light-violet-bkg cta-block bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                    <h2 class="title">@lang('signup.title')</h2>
                    <p class="subtitle">@lang('signup.subtitle')</p>
                </div>
                @include('partials.sign-up-for-solidity')
                <div class="text-center">
                    @include('partials.contact-icons')
                </div>
            </div>
        </div>
    </div>


@endsection
