@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions instructions-faq', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">@lang('ico-instructions.faq-headline')</h1>
                            <p class="subtitle">@lang('ico-instructions.faq-subtitle')</p>

                            <div class="panel-group faq-block" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#1" aria-expanded="false" aria-controls="1">
                                            <h3 class="panel-title">@lang('ico-instructions.faq-question-1')</h3>
                                        </div>
                                    </div>
                                    <div id="1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="1">
                                        <div class="panel-body">
                                            <p>@lang('ico-instructions.faq-answer-1')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#2" aria-expanded="false" aria-controls="2">
                                            <h3 class="panel-title">@lang('ico-instructions.faq-question-2')</h3>
                                        </div>
                                    </div>
                                    <div id="2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="2">
                                        <div class="panel-body">
                                            <p>@lang('ico-instructions.faq-answer-2')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#5" aria-expanded="false" aria-controls="5">
                                            <h3 class="panel-title">@lang('ico-instructions.faq-question-3')</h3>
                                        </div>
                                    </div>
                                    <div id="5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="5">
                                        <div class="panel-body">
                                            <p>@lang('ico-instructions.faq-answer-3')</p>
                                              <ol>
                                                  <li>@lang('ico-instructions.faq-answer-4')</li>
                                                  <li>@lang('ico-instructions.faq-answer-5')</li>
                                                  <li>@lang('ico-instructions.faq-answer-6')</li>
                                              </ol>
                                            <p>@lang('ico-instructions.faq-answer-7')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#6" aria-expanded="false" aria-controls="6">
                                            <h3 class="panel-title">@lang('ico-instructions.faq-question-4')</h3>
                                        </div>
                                    </div>
                                    <div id="6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="6">
                                        <div class="panel-body">
                                            <p>@lang('ico-instructions.faq-answer-8')</p>
                                            <p>@lang('ico-instructions.faq-answer-9')</p>
                                            <p>@lang('ico-instructions.faq-answer-10')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#7" aria-expanded="false" aria-controls="7">
                                            <h3 class="panel-title">@lang('ico-instructions.faq-question-5')</h3>
                                        </div>
                                    </div>
                                    <div id="7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="7">
                                        <div class="panel-body">
                                            <p>@lang('ico-instructions.faq-answer-11')</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab">

                                        <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#10" aria-expanded="false" aria-controls="10">
                                            <h3 class="panel-title">@lang('ico-instructions.faq-question-6')</h3>
                                        </div>
                                    </div>
                                    <div id="10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="10">
                                        <div class="panel-body">
                                            <p>Twitter: @bitdegree_org<br>
                                                Facebook: <a href="https://www.facebook.com/bitdegree" target="_blank" rel="nofollow">https://www.facebook.com/bitdegree</a><br>
                                                Telegram: <a href="https://t.me/bitdegree" target="_blank" rel="nofollow">https://t.me/bitdegree</a><br>
                                                Reddit: r/BitDegree/<br>
                                                Blog: <a href="https://blog.bitdegree.org" target="_blank" rel="nofollow">https://blog.bitdegree.org</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

