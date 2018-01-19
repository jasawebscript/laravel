@extends('layouts.landing')

@section('content')

    <div id="faqs" class="main faqs faq-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="title">FAQs</h2>
                </div>
            </div>

            @foreach($faq as $category)
                <h4 class="title">{{ $category->name }}</h4>
                <div class="panel-group faq-block faq-collapsable" id="accordion-{{ str_slug($category->name) }}" role="tablist" aria-multiselectable="true">
                    @foreach($category->questions as $item)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab">
                                <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion-{{ str_slug($category->name) }}" href="#{{ str_slug($item->question) }}" aria-expanded="false" aria-controls="{{ str_slug($item->question) }}">
                                    <h3 class="panel-title">{{ $item->question }}</h3>
                                </div>
                            </div>
                            <div id="{{ str_slug($item->question) }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="{{ str_slug($item->question) }}">
                                <div class="panel-body">{!! $item->answer !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br>
                @endforeach

        </div>
    </div>

    @include('partials.subscribe-bottom')

@endsection

@push('body-scripts')

    <script>
        jqWait(function () {
            if(window.location.hash.length > 0 && window.location.hash !== 'faq') {
                $(window.location.hash).addClass('in');
                $(document).ready(function () {
                    $('html').animate({scrollTop: $('html').scrollTop() - 150}, '500');
                });
            }
            $('.faq-collapsable').on('shown.bs.collapse', function (e) {
                window.history.pushState(null, null, '#' + e.target.id);
            });
        });
    </script>

@endpush