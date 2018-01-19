@php
$bonusAvailable = !!$currentBonus;
$bonus = (($currentBonus['bonus'] ?? 1)-1) * 100;
$rate = config('ico.rate') * ($currentBonus['bonus'] ?? 1);
@endphp
<div class="modal fade" role="dialog" id="token-calc-modal" tabindex="-1" aria-labelledby="gridModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <div class="modal-title">
                    <h2>@lang('ico.calculator')</h2>
                </div>
            </div>

            <div class="modal-body text-left">
                <div class="content">
                    <div class="row" id="token-calculator">
                        <div class="{{ $bonus > 0 ? "col-md-4" : "col-md-6" }}">
                            <h4>@lang('ico.amount-eth')</h4>
                            <input type="number" id="amt-eth">
                        </div>
                        <div class="{{ $bonus > 0 ? "col-md-4" : "col-md-6" }}">
                            <h4>@lang('ico.amount-tokens')</h4>
                            <input type="number" id="amt-tokens">
                        </div>
                        @if($bonus > 0)
                            <div class="col-md-4">
                                <span class="label label-success">@lang('ico.eth-calc-included', [
                                    'amount' => $bonus,
                                ])</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('body-scripts')
    <script src="{{ asset_rev('big.min.js') }}"></script>
    <script>
        jqWait(function () {
            var
                amtEth = $("#amt-eth"),
                amtTokens = $("#amt-tokens"),
                totalSupply = new Big({{ config('ico.hardCap') }}),
                rate = new Big({{ $rate }});

            amtEth.val(150);
            ethChanged();

            amtEth.keyup(ethChanged).change(ethChanged);
            amtTokens.keyup(tokensChanged).change(tokensChanged);

            function ethChanged() {
                var amt = parseFloat(amtEth.val().replace(",", "."));

                amt = new Big(isNaN(amt) || amt <= 0 ? 0 : (amt > totalSupply / rate ? totalSupply / rate : amt));
                amtTokens.val(amt.times(rate).toFixed(0));
            }

            function tokensChanged() {
                var amt = parseFloat(amtTokens.val().replace(",", "."));

                amt = new Big(isNaN(amt) || amt <= 0 ? 0 : (amt > totalSupply ? totalSupply : amt));
                amtEth.val(amt.div(rate).toFixed(2));
            }
        });
    </script>
@endpush