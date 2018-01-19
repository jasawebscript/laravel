@extends('layouts.landing', ['navBarOnly' => true, 'bodyClass' => 'degree-list'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2>Progress</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Raised ETH</th>
                        <th>Raised USD</th>
                        <th>Transaction Count</th>
                        <th>Average value per TX</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ number_format($raisedEth, 4) }} ETH</td>
                        <td>${{ number_format(bcmul($raisedEth, $priceHistory->last() ?? 0), 2) }} <small class="text-muted">@ ${{ number_format($priceHistory->last() ?? 0, 2) }}/ETH</small></td>
                        <td>{{ $txns->count() }}</td>
                        <td>{{ number_format($txns->average('value')/bcpow(10,18),2) }} ETH</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div id="txns-chart"></div>
                <h2>Transactions</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                       <th>Day</th>
                       <th>Transaction Count</th>
                       <th class="text-right">ETH value</th>
                       <th class="text-right">Average value per TX</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($txnsByDay as $day => $txns)
                        <tr>
                            <td><a href="{{ route('admin.txns', ['date' => $day, 'key' => $key]) }}#term-stats">{{ $day }}</a></td>
                            <td><a href="{{ route('admin.txns', ['date' => $day, 'key' => $key]) }}#txns">{{ $txns->count() }}</a></td>
                            <td class="text-right">{{ number_format($txns->sum('value')/bcpow(10,18),2) }} ETH</td>
                            <td class="text-right">{{ number_format($txns->average('value')/bcpow(10,18),2) }} ETH</td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>

                <h2>Top Affiliates</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Affiliate</th>
                            <th class="text-right">Referrals</th>
                            <th class="text-right">Referral Contributions</th>
                            <th class="text-right">Confirmed Contributions</th>
                            <th>Estimated Commission</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($referrals as $item)
                            <tr>
                                <td>{{ $item['affiliate']->first_name . " " . $item['affiliate']->last_name }}<div>{{ $item['affiliate']->email }}</div></td>
                                <td class="text-right">{{ $item['users']->count() }}</td>
                                <td class="text-right">{{ number_format($item['contributed']/bcpow(10,18),2) }} ETH</td>
                                <td class="text-right">{{ number_format($item['contributed_after']/bcpow(10,18),2) }} ETH</td>
                                <td class="text-right">{{ number_format($item['estimated_commission']/bcpow(10,18),2) }} BDG</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <h2 id="term-stats">
                    @if($hasDate)
                        Statistics for {{ $date }}
                        <a href="{{ route('admin.txns', compact('key')) }}#term-stats" class="btn btn-xs btn-default">show all</a>
                    @else
                        All time stats
                    @endif
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Contributions by country</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Country</th>
                        <th class="text-right">ETH</th>
                        <th>txns</th>
                        <th class="text-right">ETH per tx</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($countryTxns as $country => $txns)
                        <tr>
                            <td>{{ $country }}</td>
                            <td class="text-right">{{ number_format($txns->sum('value')/bcpow(10,18),2) }} ETH</td>
                            <td>{{ $txns->count() }}</td>
                            <td class="text-right">{{ number_format($txns->average('value')/bcpow(10,18),2) }} ETH</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="col-md-6">
                <h4>Top 10 contributors</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Address</th>
                        <th>Contribution</th>
                        <th>Country</th>
                        <th>User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($holders->slice(0,10) as $address => $txns)
                        @php($user = $users->get($address))
                        <tr>
                            <td style="font-size:1.5rem"><code><a target="_blank" href="https://etherscan.io/address/{{ $address }}">{{ substr($address,0,16) }}...</a></code></td>
                            <td class="text-right">{{ number_format($txns->sum('value')/bcpow(10,18),2) }} ETH</td>
                            <td>{{ $user->country ?? "UNKNOWN" }}</td>
                            <td>
                                @if($user)
                                    {{ trim($user->first_name. " " . $user->last_name) ? : "name not set" }} <br>
                                    {{ $user->birthday ? $user->birthday->format('Y-m-d') : "birthday not set"}} <br>
                                    @if($user->identification)
                                        <div class="text-success">identification uploaded</div>
                                    @else
                                        <div class="text-warning">identification not uploaded</div>
                                    @endif
                                @else
                                    <div class="text-muted">N/A</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row" id="txns">
            <div class="col-md-12">
                <h2>
                    @if($hasDate)
                        Transactions for {{ $date }}
                        <a href="{{ route('admin.txns', compact('key')) }}#txns" class="btn btn-xs btn-default">show all</a>
                    @else
                        All transactions
                    @endif
                </h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>TX</th>
                        <th>Address</th>
                        <th>Value</th>
                        <th>Country</th>
                        <th>User</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($maxContribution = $filteredTxns->max('value'))
                    @php($maxContribution = $maxContribution = $maxContribution > 300 * bcpow(10,18) ? 300 * bcpow(10,18) : $maxContribution)
                    @foreach($filteredTxns->reverse() as $tx)
                        <tr style="font-size: 1.4rem">
                            <td title="{{ date('Y-m-d H:i:s', $tx->timeStamp) }}">{{ Carbon\Carbon::createFromTimestamp($tx->timeStamp)->diffForHumans() }}</td>
                            <td><code><a target="_blank" href="https://etherscan.io/tx/{{ $tx->hash }}">{{ substr($tx->hash,0,32) }}...</a></code></td>
                            <td><code><a target="_blank" href="https://etherscan.io/address/{{ $tx->from }}">{{ $tx->from }}</a></code></td>
                            <td style="background-color: rgba(52,222,131, {{ $tx->value/$maxContribution }})" class="text-right">{{ number_format($tx->value / bcpow(10,18), 4) }} ETH</td>
                            <td>{{ $tx->country }}</td>
                            <td>
                                @if($tx->user)
                                    {{ trim($tx->user->first_name. " " . $tx->user->last_name) ? : "name not set" }} <br>
                                    {{ $tx->user->birthday ? $tx->user->birthday->format('Y-m-d') :  "birthday not set"}} <br>
                                    @if($tx->user->identification)
                                        <div class="text-success">identification uploaded</div>
                                    @else
                                        <div class="text-warning">identification not uploaded</div>
                                    @endif
                                @else
                                    <div class="text-muted">N/A</div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Timestamp', 'ETH price in USD', 'ETH raised'],
                @foreach($txnsByHour as $date => $raised)
                    ['{{ $date }}', {{ $priceHistory->get($date, $priceHistory->count() > 0 ? $priceHistory->last() : 0) }} , {{$raised}}] {{ $loop->last ? "" : "," }}
                @endforeach
            ]);
            var materialOptions = {
                //curveType: 'function',
                chart: {
                    title: 'ETH price and Contribution Size'
                },
                series: {
                    // Gives each series an axis name that matches the Y-axis below.
                    0: {axis: 'Price'},
                    1: {axis: 'Contribution'}
                },
                axes: {
                    // Adds labels to each axis; they don't have to match the axis names.
                    y: {
                        Price: {label: 'Price'},
                        Contribution: {label: 'Contribution'}
                    }
                },
                legend: {
                    position: 'none'
                }
            };

            var chart = new google.charts.Line(document.getElementById('txns-chart'));

            chart.draw(data, materialOptions);
        }
    </script>
@endsection