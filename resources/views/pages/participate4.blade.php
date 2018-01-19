@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens logged-in instructions', 'hideFooter' => true])

@section('content')

    <div class="container-fluid">
        @include('partials.instructions-menu')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pt-3 ">

            <div class="main container-main">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <h1 class="text-center">How to transfer ETH from MyEtherWallet to receive BDG tokens</h1>
                            <p>This tutorial will provide detailed instructions on how to get BDG tokens with Ethereum using MyEtherWallet.</p>


                            <h4><b>Step 1:</b> Go to <a href="https://www.bitdegree.org" target="_blank" rel="nofollow">https://www.bitdegree.org</a> and press <b>Get Tokens Now</b>.</h4>
                            <img src="{{ asset_rev('instructions/transfer-3.png') }}" alt="transfer">

                            <h4><b>Step 2:</b> Sign up with your email address and come up with a secure password. Agree with the Terms of Service and Privacy Policy. Click <b>Join Crowdsale</b>.</h4>
                            <img src="{{ asset_rev('instructions/transfer-4.png') }}" alt="transfer">

                            <h4><b>Step 3:</b> Once you’re in, copy the the BitDegree crowdsale address that you will see on your screen.</h4>
                            <img src="{{ asset_rev('instructions/transfer-5.jpeg') }}" alt="transfer">

                            <h4><b>Step 4:</b> Go to the MyEtherWallet website at <a href="https://www.myetherwallet.com" target="_blank" rel="nofollow">https://www.myetherwallet.com</a>. Make sure that you access the website via an HTTPS address.</h4>

                            <img src="{{ asset_rev('instructions/transfer-6.png') }}" alt="transfer">

                            <h4><b>Step 5:</b> Go to the <b>Send Ether & Tokens</b> Tab</h4>
                            <img src="{{ asset_rev('instructions/transfer-7.png') }}" alt="transfer">
                            <p>Choose how you would like to access your wallet. If you choose to access using your private key, simply enter your private key in the provided input box and press the Unlock button to proceed.</p>

                            <h4><b>Step 6:</b> Send ETH to the BDG Token Sale Address that you have copied in the Step 3.</h4>
                            <img src="{{ asset_rev('instructions/transfer-8.png') }}" alt="transfer">

                            <h4><b>When sending ETH, you will be asked to fill the Send Transaction form.</b></h4>

                            <p>● In the To Address field, paste the token sale address copied from the BitDegree website in Step 3.</p>
                            <p>● In the Amount to Send field, fill in the amount of ETH you wish to use to buy BDG tokens.</p>
                            <p>● In the Gas Limit field, change the minimum amount to <span class="red"><b>200,000 gas</b></span>. This will ensure that your transaction is processed.</p>
                            <img src="{{ asset_rev('instructions/transfer-1.png') }}" alt="transfer">

                            <p>● In the upper right corner set the GAS price to <span class="red"><b>50 GWEI</b></span> or more. Due to constant clog of the Ethereum network it is recommended to increase the GAS price for the transaction to go through.</p>
                            <img src="{{ asset_rev('instructions/transfer-2.png') }}" alt="transfer">

                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <div class="well">
                                        <p><span class="red"><b>NOTE:</b> transactions without GAS limit will be invalid.</span><br>
                                            Due to high demand of the BitDegree tokens and constant clogging of the Ethereum Network we recommend using these parameters so that your transactions would go through:<br>
                                            <b>GAS limit: 200 000</b><br>
                                            <b>GAS price: 50 GWEI or higher</b></p>
                                    </div>
                                </div>
                            </div>

                            <img src="{{ asset_rev('instructions/transfer-9.png') }}" alt="transfer">

                            <p>● Click on <b>Generate Transaction</b> then click on the <b>Send Transaction</b> button.</p>

                            <p>A popup will appear. MyEtherWallet will ask you to confirm the transaction. If the data is correct and you wish to proceed, click Yes, I am sure! Make transaction. Wait and DO NOT click on this button more than once.</p>

                            <img src="{{ asset_rev('instructions/transfer-10.png') }}" alt="transfer">

                            <p>Congratulations! You have now purchased the amount of BDG that corresponds to the amount of ETH you sent.</p>

                            <h4><b>Step 7:</b> Go to <a href="https://etherscan.io/" target="_blank" rel="nofollow">etherscan.io</a> and enter your own MyEtherWallet address.</h4>

                            <img src="{{ asset_rev('instructions/transfer-11.jpeg') }}" alt="transfer">

                            <h4><b>Step 8:</b> Once you enter your address, the screen should be similar to this one. In order to see your tokens, click on <b>View Tokens</b>.</h4>

                            <img src="{{ asset_rev('instructions/transfer-12.png') }}" alt="transfer">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

