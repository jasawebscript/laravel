@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in', 'hideFooter' => true])

@section('content')

    <div class="col-sm-12 col-md-12">
        <div class="main container-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img class="token-image" src="{{ asset_rev('token.png') }}" alt="BitDegree Token">
                        <p>@lang('user.congratulations', ['name' => auth()->user()->first_name ? : auth()->user()->email])</p>
                        <div class="amount-of-tokens">
                            @lang('user.tokens_secured', ['number' => auth()->user()->airdrop])
                        </div>
                        <div class="col-md-8 col-md-offset-2 text-left">
                            <div class="well">
                                <p>To claim your <b>FREE BDG</b> is simple. All you have to do is the following:</p>
                                <ul>
                                    <li> * Join our Telegram group: <a href="https://t.me/bitdegree" rel="nofollow" target="_blank">https://t.me/bitdegree</a></li>
                                    <li>* Follow us on Twitter: <a href="https://twitter.com/bitdegree_org" rel="nofollow" target="_blank">https://twitter.com/bitdegree_org</a></li>
                                    <li>* No cheating</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2 bounty-note">
                        <p>To receive your Tokens for sharing, join the BitDegree Bounty campaign <a href="https://bitcointalk.org/index.php?topic=2225880.0" target="_blank" style="color:#ec7686;"><b>here</b></a>.</p>
                        <p>The bounty campaign consists of many ways you can earn tokens, all you need is an account on bitcointalk forum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection