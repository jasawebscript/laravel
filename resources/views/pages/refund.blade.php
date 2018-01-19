@extends('layouts.dashboard', ['navBarOnly' => true, 'bodyClass' => 'login-page get-tokens refund logged-in', 'hideFooter' => true])

@section('content')

    <form action="{{ route('refund') }}" method="post">
        <div class="container-fluid">
            <div class="col-sm-12 col-md-8 col-md-offset-2 refund-page">

                <div class="main container-main">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 text-center">
                                @include('partials.status')
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 text-center">
                                @if(request()->get('tutorial'))
                                    <h1>How to refund your BDG tokens and get your ETH</h1>
                                @else
                                    <h1>REFUNDING FOR USA CITIZENS</h1>
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                                @if(request()->get('tutorial'))
                                    <p class="text-center"><a href="{{ route('refund') }}" class="btn btn-primary back">Go back</a></p>
                                    <div class="alert alert-danger">This tutorial is only valid starting January 12th when tokens become freely tradable between wallets and only to the crowdsale participants from the US!</div>
                                    <div class="alert alert-danger">To get your refund, you must transfer your BDG tokens by <strong>January 31, 2018</strong>. After you’ve made the token refund, your contributed ETH will be transferred to you by <strong>February 10, 2018</strong>.</div>
                                    <p>This tutorial covers the steps on how to refund your BDG tokens by using MyEtherWallet (MEW). There are two main tutorial parts that have to be completed in order to return your BDG tokens and get back the ETH you’ve contributed during the crowdsale:</p>
                                    <p><strong>Part 1. Add BDG token as a custom token to you MEW</strong></p>
                                    <p>If, you’ve already added BDG token to your MEW, please proceed with Part 2 of this tutorial.</p>
                                    <ol>
                                        <li>Go to https://www.myetherwallet.com/ and access your wallet.</li>
                                        <li>To import information view about your token to your <a href="https://myetherwallet.com/" target="_blank">MyEtherWallet</a>, simply go to <strong>Send Ether and Tokens</strong> section and look for a sidebar on the right with <strong>Token Balances</strong> title.</li>
                                        <li>
                                            Click <strong>Add Custom Token</strong>
                                            <img src="{{ asset_rev('refund-step1.png') }}" class="screenshot" alt="Adding a Custom Token">
                                        </li>
                                        <li>Fill in:<br>
                                            Address: <code>{{ env('TOKEN_ADDRESS') }}</code><br>
                                            Token Symbol: <code>BDG</code><br>
                                            Decimals: <code>18</code></li>
                                        <li>Click Save and see your BDG tokens.</li>
                                    </ol>
                                    <strong>Part 2. Transfering BDG tokens from your MEW and getting your ETH</strong>
                                    <ol>
                                        <li>Go to <a href="https://www.myetherwallet.com/" target="_blank">https://www.myetherwallet.com/</a> and access your wallet.</li>
                                        <li>Go to <strong>Send Ether &amp; Tokens</strong> tab.</li>
                                        <li>Enter the following values:
                                            Address <strong>(1)</strong>: <code>{{ env('TOKEN_OWNER') }}</code><br>
                                            Amount of BDG tokens for refund <strong>(2)</strong>: <code>{{ bcdiv($refund->tokens, 1, 18) }}</code><br>
                                            Don’t forget to switch ETH to BDG <strong>(4)</strong>!<br>
                                            Gas Limit <strong>(3)</strong>: 90000 Gwei (recommended)<br>
                                            Gas price <strong>(5)</strong>: 40-50 Gwei (recommended)
                                            <img src="{{ asset_rev('refund-step2.png') }}" class="screenshot" alt="Making the transfer">
                                        </li>
                                        <li>Once you’ve set the parameters click <strong>Generate Transaction</strong>.</li>
                                    </ol>
                                    <p>After completing these steps, you’ve successfully returned your BDG tokens. Your ETH will be returned within 10 days after January 31, 2018.</p>
                                    <p><strong>Note:</strong></p>
                                    <p>You must return your tokens from <strong>January 12, 2018</strong> to <strong>January 31, 2018</strong>.</p>
                                    <p>You will receive your ETH for the refunded tokens by <strong>February 10, 2018</strong>.</p>
                                @elseif($refund->accepted_at === null)
                                    <p>BDG token — is a utility token that will represent the future access to a learning platform’s services. BitDegree is fully compliant with law and wants to focus on project only, without taking any risks or putting contributors into it, which can affect the success of the whole blockchain based learning platform. It has <a style="color: #ffbcbc; font-weight:bold;" href="https://blog.bitdegree.org/bank-of-lithuania-confirms-bitdegree-token-and-model-of-operation-is-fully-within-legal-frameworks-ad0cb8e335c2">received confirmation</a> from Bank of Lithuania, acting under maintenance of European Central Bank, that token and model of operation is fully within legal frameworks.</p>
                                    <p>As you may already know, taking into account newest legal practice in United States regarding securities & non-securities starting from middle of December 2017, questions related with tokens and causing uncertainty, BitDegree voluntarily decided to avoid any possible legal risks, including minimal or hypothetical, and to stop new contributions from United States residents, citizens, green card holders and taxpayers at BitDegree’s crowdsale.</p>
                                    <p>According to above, residents of the United States participated in Bitdegree’s crowdsale will have an ability to be <b>voluntarily refunded until 31th January, 2018</b>, if they express an interest in returning their tokens by <b>January 11th, 2018</B> .</p>
                                    <p>Before taking decision regarding your possibility to refund please kindly be informed, that:</p>
                                    <p><b>(i) BitDegree token is a utility token that will be used in the operation cycles of the learning platform and will represent future access to a platform’s products and services;</b></p>
                                    <p><b>(ii) there is no real assumptions or probabilities to believe or assume, that BitDegree token’s value will rise or grow. So, you should not have any though, guesses or forecasts, that token’s value may or will grow or rise;</b></p>
                                    <p><b>(iii) purchase of BitDegree tokens shall be based just on participation on the project, not on speculative or investments motives. Therefore, if you purchased BitDegree tokens in order receive any profit from that later, please use our refund program, because, as mentioned above, there is no assumptions to believe, that BitDegree token’s value will or may rise.</b></p>
                                    <p>We believe that BitDegree Learning Platform will succeed and revolutionize education from the base.</p>
                                    <p>If you would still like to refund, check the box below frequently asked questions.</p>
                                    <h3>Frequently Asked Questions</h3>
                                    <p><strong>Do I have to refund?</strong></p>
                                    <p>Only if you want to. This is not an obligation.</p>
                                    <p><strong>What happens if I don't refund?</strong></p>
                                    <p>Nothing. You will continue having your BDG tokens.</p>
                                    <p><strong>Will I lose my tokens if I don’t refund?</strong></p>
                                    <p>No, you will not lose your tokens. The ownership of the tokens is governed by a Smart Contract. Once the tokens are assigned to your address, we have no way of freezing or taking them away from you.</p>
                                    <p><strong>How much time do I have for refund?</strong></p>
                                    <p>You have to decide till January 11th,2018. If decide to refund, transfer the tokens 12th-31st January, 2018 according to instructions. Once tokens are returned, you will receive your contributed ETH 1st-10th February, 2018.</p>
                                    <p><strong>Can I refund only part of my tokens?</strong></p>
                                    <p>No, if you decide to refund, you must return all tokens.</p>
                                @else
                                    @if($instructionsAvailable)
                                        <p><strong>Step 1.</strong> Transfer tokens back to BitDegree</p>
                                        <p>Address from which you must send the tokens:</p>
                                        <p>
                                            <input type="text" class="form-control no-capitalization" onclick="this.setSelectionRange(0, this.value.length)" readonly value="{{ $refund->wallet }}">
                                            <span class="small">This is the address you've supplied during crowdsale.</span>
                                        </p>
                                        <p>Amount of <strong>BDG Tokens</strong> to transfer:</p>
                                        <p>
                                            <input type="text" class="form-control no-capitalization" onclick="this.setSelectionRange(0, this.value.length)" readonly value="{{ bcdiv($refund->tokens, 1, 18) }}">
                                            <span class="small">This is the amount of tokens you got during the crowdsale.</span>
                                        </p>
                                        <p>Address to which send the tokens:</p>
                                        <p>
                                            <input type="text" class="form-control no-capitalization" onclick="this.setSelectionRange(0, this.value.length)" readonly value="{{ env('TOKEN_OWNER') }}">
                                            <span class="small">This is the BitDegree's main address.</span>
                                        </p>
                                        <p>Amount of ETH you will receive in return:</p>
                                        <p>
                                            <input type="text" class="form-control no-capitalization" onclick="this.setSelectionRange(0, this.value.length)" readonly value="{{ bcdiv($refund->ether, 1, 18) }}">
                                            <span class="small">This is the amount of Ether you sent to BitDegree Crowdsale Smart Contract.</span>
                                        </p>
                                    @else
                                        <p>You have selected to opt for a refund.</p>
                                        <p>Check this page once again from <strong>January 12, 2018 to January 31, 2018</strong>. During these days you will be provided you with detailed instructions on how to receive your refund.</p>
                                        <p><strong>Important:</strong> do not transfer your BDG tokens once transfers are enabled! You will need to return all tokens that you got from Crowdsale Smart Contract to BitDegree if you want to receive the refund.</p>
                                        <p>You can check the tutorial on how the refund will work <a href="{{ route('refund', ['tutorial' => 1]) }}">here</a>. Please note that it will only work on <strong>January 12, 2018</strong>.</p>
                                    @endif
                                @endif

                                @if(request()->get('tutorial'))
                                    <p><a href="{{ route('refund') }}" class="btn btn-primary back">Go back</a></p>
                                @else
                                    <h3>Refund decision status</h3>
                                    <div class="choice">
                                        <input tabindex="3" type="radio" id="refund-nay" name="refund" {{ $refund->accepted_at === null ? 'checked' : '' }} value="0">
                                        <label for="refund-nay">No, I don't want to refund and I want to keep my BDG tokens</label>
                                    </div>
                                    <div class="choice">
                                        <input tabindex="3" type="radio" id="refund-yay" name="refund" {{ $refund->accepted_at !== null ? 'checked' : '' }} value="1">
                                        <label for="refund-yay">Yes, I want to refund my BDG tokens</label>
                                    </div>

                                    <div class="text-center login-cta signup-cta cta"><button tabindex="5" type="submit" class="btn btn-primary">SAVE</button></div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! csrf_field() !!}
    </form>

@endsection
