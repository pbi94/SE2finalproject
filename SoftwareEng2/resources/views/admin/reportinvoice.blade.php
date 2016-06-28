@extends('admin.layouts.adminlayout')

@section('Content')
    <div class="panel panel-default">
        <div class="panel-heading hidden-print">Invoice</div>
        <div class="panel-body">

            <section class="invoice-env">

                <!-- Invoice header -->
                <div class="invoice-header">

                    <!-- Invoice Options Buttons -->
                    <div class="invoice-options hidden-print">

                        <a href="" onclick="window.print()" class="btn btn-block btn-secondary btn-icon btn-icon-standalone btn-icon-standalone-right btn-single text-left">
                            <i class="fa-print"></i>
                            <span><strong>Print</strong></span>
                        </a>
                    </div>

                    <!-- Invoice Data Header -->
                    <div class="invoice-logo">
                        <ul class="list-unstyled">
                            <li class="upper"><strong>TaxiBan Agency</strong></li>
                            <li>Powered by</li>
                            <li style="font-size: 10px;">Z Gasem Nejad</li>
                            <li style="font-size: 10px;">Z Maleki</li>
                            <li style="font-size: 10px;">S Hosseini</li>
                            <li style="font-size: 10px;">M Masoumi</li>
                        </ul>

                    </div>

                </div>

                <!-- Client and Payment Details -->
                <div class="invoice-details">

                    <div class="invoice-client-info">
                        <strong>Driver</strong>

                        <ul class="list-unstyled">
                            <li>{{ $user->name }}       </li>
                            <li>{{ $user->phonenumber }}</li>
                            <li>{{ $user->email }}      </li>
                        </ul>

                        <ul class="list-unstyled">
                            <li>{{ $user->family }}</li>
                        </ul>
                    </div>

                    <div class="invoice-payment-info">
                        <strong>Drives Details</strong>

                        <ul class="list-unstyled">
                            <li>Score     : <strong>{{ $driver->score }}         </strong></li>
                            <li>Service  #: <strong>{{ $driver->servicecounter }}</strong></li>
                            <li>Plate code: <strong>{{ $driver->plate }}         </strong></li>
                        </ul>
                    </div>
                </div>

                <!-- Invoice Entries -->
                <table class="table table-bordered">
                    <thead>
                    <tr class="no-borders">
                        <th class="text-center hidden-xs">#</th>
                        <th width="20%" class="text-center">Name</th>
                        <th class="text-center hidden-xs"><p>Date</th>
                        <th class="text-center">score</th>
                        <th class="text-center">Taxi Meter</th>
                        <th class="text-center">Cost</th>
                        <th class="text-center">Pay</th>
                    </tr>
                    </thead>
                    <input type="hidden" value="{{ $i = 0 }}">

                    <tbody>
                        @foreach($cusotmers as $customer)
                            @if($customer->payed)
                                <tr style="opacity: 0.1;
                                            filter: alpha(opacity=10);">
                            @else
                                <tr>
                            @endif
                                <td class="text-center hidden-xs">{{ $i++ }}</td>
                                <td><p>{{ $customer->name }} </p>
                                    <br/>
                                    <p>{{ $customer->family  }}</p>
                                    <br/>
                                    <p>{{ $customer->phonenumber  }}</p></td>
                                <td class="text-center hidden-xs">
                                    <input type="hidden" value="
                                    {{ $st =  \Carbon\Carbon::parse($customer->startservice) }}
                                    {{ $et =  \Carbon\Carbon::parse($customer->endservice) }}
                                    {{ $interval =  $st->diffInHours($et, false) }}">
                                    <p><strong>From:</strong>{{  $customer->startservice }} </p><br/>
                                    <p> <strong>To:</strong>{{ $customer->endservice  }}</p></td>
                                <td class="text-right text-primary text-bold">{{ $customer->score }}</td>
                                <td class="text-right text-primary">{{ $customer->taximeter }} <em>km</em></td>
                                <td class="text-right text-primary">{{  $driver->hourlywage * $interval  }}</td>
                                <td class="text-right text-primary">
                                    @if($customer->payed)
                                        <a class="btn btn-primary" disabled="disabled"><strong>Pay</strong></a>
                                    @else
                                        <a  href="/admin/report/{{ $user->id }}/pay/{{$customer->id}}" class="btn btn-primary"><strong>Pay</strong></a>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Invoice Subtotals and Totals -->
                <div class="invoice-totals">

                    <div class="invoice-subtotals-totals">
								<span>

									Sub - Total amount:
									<strong>$
                                        {{ $Tpayment }}
                                    </strong>
								</span>

								<span>
									Agency Contribution:
									<strong>30.0%</strong>
								</span>

								<span>
									VAT:
									<strong>-----</strong>
								</span>

                        <hr>

								<span>
									Grand Total:
									<strong>${{ $Tpayment * 0.7 }}</strong>
								</span>
                    </div>

                    <div class="invoice-bill-info">
                        <address>
                            TaxiBan <br>
                            Tehran-Lavizan-Shabanlu ST<br>
                            TEL: (021) 779-21540 <br>
                            {{ \Carbon\Carbon::now() }}<br>
                            <a href="#">about@taxiban.com</a>
                        </address>
                    </div>

                </div>

            </section>

        </div>
    </div>
    @stop

    @section('Username')
    {{ $userD->name . " " .  $userD->family }}
    @stop

    @section('Email')
    {{ $userD->email }}
    @stop

    @section('EventNum')
            <!-- TODO: set Event Number -->
    5
    @stop

    @section('BottomScript')

            <!-- Bottom Scripts -->
    <script src="{{ url('assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('assets') }}/js/TweenMax.min.js"></script>
    <script src="{{ url('assets') }}/js/resizeable.js"></script>
    <script src="{{ url('assets') }}/js/joinable.js"></script>
    <script src="{{ url('assets') }}/js/xenon-api.js"></script>
    <script src="{{ url('assets') }}/js/xenon-toggles.js"></script>


    <!-- JavaScripts initializations and stuff -->
    <script src="{{ url('assets') }}/js/xenon-custom.js"></script>
    <style>
        td{
            vertical-align: middle !important;
            text-align: center !important;
        }

    </style>

@stop