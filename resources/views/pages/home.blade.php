@extends('layouts.landing')

@section('content')
    @include('partials.landing.what-we-are')
    @include('partials.landing.award-block')
    @include('partials.landing.media')
    @include('partials.landing.twitter-feed')
    @include('partials.landing.starting-point')
    @include('partials.landing.animated-video-section')
    @include('partials.landing.prototype-economy')
    @include('partials.landing.stats-moocs')
    @include('partials.landing.how-it-works-mvp-2')
    @include('partials.landing.stats-demand')
    @include('partials.landing.how-it-works')
    @include('partials.landing.backed-by-hostinger')
    @include('partials.landing.token-distribution')
    @include('partials.landing.team')
    @include('partials.landing.partners')
    @include('partials.landing.subscribe')
    @include('partials.landing.roadmap')
    @include('partials.landing.trust')
    @include('partials.landing.subscribe-alt')
    @include('partials.chat')
@endsection

@push('body-scripts')
    <script type="text/javascript">
        jqWait(function () {
            $('#sidebar').on('activate.bs.scrollspy', function (event) {
                var hash = $("a", event.target).attr('href');

                if(history) {
                    history.replaceState({}, $('title').text(), hash)
                } else {
                    window.location.hash = hash;
                }
            });
        });
    </script>
@endpush