<div id="why-us" class="main animated-video explanation light-violet-bkg">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-push-2">
                <h2 class="title center">@lang('home.problems_headline')</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-12 text-center">
                <div class="video-block">
                    @if($currentLanguage == "cn")
                        <iframe height=461 width=820 src='https://player.youku.com/embed/XMzIzMTcxMjE1Ng==' frameborder=0 'allowfullscreen'></iframe>
                    @else
                        <iframe width="820" height="461" src="https://www.youtube.com/embed/RuckLtuInNY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 animated-video-desc">
               <p>@lang('home.video-description')</p>
            </div>
        </div>

    </div>
</div>