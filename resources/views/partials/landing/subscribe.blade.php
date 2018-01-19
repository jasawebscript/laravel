 <div class="main container-fluid communicate light-violet-bkg cta-block">
        <div class="container text-center">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-push-2 text-center">
                    <h2 class="title">@lang('subscribe.title')</h2>
                </div>
            </div>

            <div class="row find-out-more">
                <div class="col-xs-12 text-center">
                    <p class="subtitle">@lang('subscribe.subtitle')</p>
                    <div class="contact">
                        <form action="https://bitdegree.us16.list-manage.com/subscribe/post?u=528cc9372b916077746636344&amp;id=992e814dd1" method="post">
                            <input class="suscribe-input" name="EMAIL" type="email" placeholder="@lang('subscribe.email_placeholder')" required>
                            <input type="submit" class="submit" value="@lang('subscribe.button')" name="subscribe">
                        </form>

                            @include('partials.contact-icons')
                    </div>
                </div>
            </div>
        </div>
    </div>
