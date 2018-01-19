@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">How to check my BDG tokens</h1>

                            <h4><b>Step 1:</b> <a href="https://etherscan.io/" target="_blank" rel="nofollow">etherscan.io</a>.</h4>

                            <h4><b>Step 2:</b> Enter your own <b>MyEtherWallet</b> address to the top corner search bar.</h4>

                            <h4><b>Step 3:</b> See your BDG token transaction status and see how much BDG tokens you have obtained. Remember transaction may take some time.</h4>
                            <img src="{{ asset_rev('instructions/check-tokens-1.png') }}" alt="How to check my BDG tokens">

                            <h4><b>Step 4:</b> To import information view about your token from Etherscan to your MyEtherWallet, simply go to MyEtherWallet -> <b>Send Ether and Tokens</b> section and look for a right sidebar with <b>Token Balances</b> title.</h4>

                            <h4><b>Step 5:</b> Click <b>Add Custom Token</b></h4>
                            <img src="{{ asset_rev('instructions/check-tokens-2.jpeg') }}" alt="How to check my BDG tokens">

                            <h4><b>Step 6:</b> Fill in:</h4>

                            <p><b>Address: 0x1961B3331969eD52770751fC718ef530838b6dEE<br>
                                  Token Symbol: BDG<br>
                                  Decimals: 18</b></p>

                            <h4><b>Step 7:</b> Click <b>Save</b> and see your BDG tokens</h4>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

