<div id="mvp" class="how-it-works bitdegrees-list mvp main light-violet-bkg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-push-1 text-center">
                <div class="title-container">
                    <h2 class="title">@lang('home.mvp_title')</h2>
                    <h3 class="subtitle">@lang('home.mvp_subtitle')</h3>
                </div>
            </div>
        </div>

        @include('partials.mvp-available')

        @foreach($courses as $i => $course)
            @if($i % 3 == 0)
                <div class="row cards">
                    @endif
                    <div class="col-xs-12 col-sm-4">
                        <div class="card left course-{{ $course['key'] }}">
                            <a href="{{ $course['url'] }}">
                                <div class="courses-badges">
                                    @if($course['isFree'] ?? false)
                                        <div class="badge"><span>{{ trans('courses.free') }}</span></div>
                                    @endif
                                    @if($course['isMvp'] ?? false)
                                        <div class="badge-mvp"><span>{{ trans('courses.mvp') }}</span></div>
                                    @endif
                                    @if($course['isNew'] ?? false)
                                        <div class="badge"><span>{{ trans('courses.new') }}</span></div>
                                    @endif
                                    @if($course['isBeta'] ?? false)
                                        <div class="badge-mvp"><span>{{ trans('courses.beta') }}</span></div>
                                    @endif
                                    @if($course['isSoon'] ?? false)
                                        <div class="badge"><span>{{ trans('courses.soon') }}</span></div>
                                    @endif
                                </div>
                                <div class="degree-header">
                                    <div class="degree-overlay {{ $course['overlay'] }}"></div>
                                    <img class="degree-img" src="{{ $course['image']}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>{{ $course['title'] }}</h3>
                                    <p>{{ $course['description'] or trans('courses.coming_soon') }}</p>

                                    @if($course['sponsor'] ?? false )
                                        <div class="sponsor">
                                            <div class="by-sponsor">by</div>
                                            <img class="sponsor-img" src="{{ $course['sponsor']}}" alt="">
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                    @if($i % 3 == 2 || $loop->last)
                </div>
            @endif
        @endforeach
        <div class="text-center cta-link">
            <a href="{{ route('mvp') }}" class="cta-btn">@lang('home.mvp_c2a')</a>
        </div>
    </div>
</div>