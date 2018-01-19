<div class="row">
    <div class="col-md-12">
        <h2>How to participate</h2>
    </div>
</div>

<div class="panel-group ico-tutorials address-{{ $showAddress ? "visible" : "hidden" }} ico-data-available" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">

            <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h3 class="panel-title">
                    Information
                </h3>
            </div>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <p>Payments without data or gas limit fields are rejected.</p>

                <p>Do NOT send ETH from an exchange, Use MyEtherWallet, MetaMask, Mist or Parity wallets or other compatible wallets.</p>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">

            <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                <h3 class="panel-title">Contributing with <b>Mist</b></h3>
            </div>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="grey-block">
                            <h2>Mist Ethereum Wallet</h2>
                            <p>You can <a href="https://github.com/ethereum/mist/releases" target="_blank" rel="nofollow noopener">download Mist here</a>.</p>
                            <ol>
                                <li>Open Mist and click on <strong>Send</strong> tab at the top</li>
                                <li>Select the account from which you want to transfer funds</li>
                                <li>Paste the <a data-crowdsale-address>BitDegree Crowdsale address</a> @if($showAddress)<code>{{ $icoAddress }}</code> @endif as the destination</li>
                                <li>Enter the amount that you want to invest</li>
                                <li>Make sure Ether is selected as the currency</li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/mist/participate-1.png') }}"></div>
                            <ol start="6">
                                <li>Scroll down and select the fee. The higher the fee, the less time it will take for the transaction to get mined.</li>
                                <li>Click on <strong>Send</strong></li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/mist/participate-2.png') }}"></div>
                            <ol start="8">
                                <li>Under <strong>Provide maximum fee</strong> enter <strong>200000</strong></li>
                                <li>Type in your password</li>
                                <li>Click on <strong>Send Transaction</strong></li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/mist/participate-3.png') }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">

            <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                <h3 class="panel-title">Contributing with <b>MetaMask</b></h3>
            </div>
        </div>
        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="grey-block">
                            <h2>MetaMask</h2>
                            <p>MetaMask is a plugin for <strong>Google Chrome</strong> browser. It can be downloaded an installed from <a href="https://metamask.io/" rel="nofollow noopener">metamask.io</a></p>
                            <ol>
                                <li>Open MetaMask by clicking on its logo that is located on the right of your address bar</li>
                                <li>Choose the account from which you want to make an investment</li>
                                <li>Click on <strong>Send</strong></li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/metamask/participate-1.png') }}"></div>
                            <ol start="4">
                                <li>Put <a data-crowdsale-address>BitDegree Crowdsale address</a> @if($showAddress)<code>{{ $icoAddress }}</code>@endif as the <strong>Recipient</strong></li>
                                <li>Enter the amount of Ether that you would like to invest</li>
                                <li>Click on <strong>Next</strong></li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/metamask/participate-2.png') }}"></div>
                            <ol start="7">
                                <li>Enter <strong>200000</strong> for <strong>Gas Limit</strong></li>
                                <li>Review if everything is correct and click on <strong>Submit</strong></li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/metamask/participate-3.png') }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">

            <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                <h3 class="panel-title">Contributing with <b>MyEtherWallet</b></h3>
            </div>
        </div>
        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="grey-block">
                            <h2>MyEtherWallet</h2>
                            <ol>
                                <li>Go to <a href="https://myetherwallet.com/" target="_blank" rel="nofollow noopener">myetherwallet.com</a></li>
                                <li>Make sure the URL is correct and <strong>MYETHERWALLET LLC [US]</strong> certificate is there</li>
                                <li>Click on <strong>Send Ether & Tokens</strong></li>
                                <li>Authenticate your wallet</li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/myetherwallet/participate-1.png') }}"></div>
                            <ol start="5">
                                <li>Enter <a data-crowdsale-address>BitDegree Crowdsale address</a> @if($showAddress)<code>{{ $icoAddress }}</code> @endif into <strong>To Address</strong> field</li>
                                <li>Enter the amount of ether that you would like to invest into <strong>Amount to Send</strong> field</li>
                                <li>Make sure <strong>ETH</strong> is selected as the currency</li>
                                <li>Enter <strong>200000</strong> for <strong>Gas Limit</strong></li>
                                <li>Click on <strong>Generate Transaction</strong></li>
                                <li>Confirm by clicking on <strong>Send Transaction</strong></li>
                                <!--li>Click on <strong>Yes, I am sure! Make transaction</strong></li-->
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/myetherwallet/participate-2.png') }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">

            <div class="collapsed faq-button" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
                <h3 class="panel-title">Contributing with <b>Parity</b></h3>
            </div>
        </div>
        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="grey-block">
                            <h2>Parity</h2>
                            <p>Parity can be downloaded from <a href="https://parity.io/" target="_blank" rel="nofollow noopener">parity.io</a></p>
                            <ol>
                                <li>Open Parity</li>
                                <li>Click on <strong>Accounts</strong> tab at the top of the screen</li>
                                <li>Click on an account from which you would like to make the investment</li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/parity/participate-1.png') }}"></div>
                            <ol start="4">
                                <li>Click on <strong>Transfer</strong></li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/parity/participate-2.png') }}"></div>
                            <ol start="5">
                                <li>Make sure <strong>Ethereum</strong> is selected as the token type</li>
                                <li>Enter <a data-crowdsale-address>BitDegree Crowdsale address</a> @if($showAddress)<code>{{ $icoAddress }}</code> @endif as the <strong>recipient address</strong></li>
                                <li>Enter the <strong>amount to transfer</strong></li>
                                <li>Check the <strong>advanced sending options</strong> checkbox</li>
                                <li>Click on <strong>Next</strong></li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/parity/participate-3.png') }}"></div>
                            <ol start="10">
                                <li>For <strong>gas</strong> enter <strong>200000</strong></li>
                                <li>Click on <strong>Send</strong></li>
                            </ol>
                            <div class="tutorial-img"><img src="{{ asset_rev('tutorial/parity/participate-4.png') }}"></div>
                            <ol start="12">
                                <li>Enter your account password and click on <strong>Confirm Request</strong></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
