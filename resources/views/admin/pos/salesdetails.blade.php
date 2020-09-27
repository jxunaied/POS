@extends('layouts.app')

@section('content')

<div class="content-page" id="printableArea">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">
                            <h4>Invoice</h4>
                        </div> -->
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right">Uttora Bricks</h4>
                                </div>
                                <div class="pull-right">
                                    <h4>Invoice # <br>
                                        <strong>{{date('d-m-y')}}_{{$orders->id}}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="pull-left m-t-30">
                                        <address>
                                            <strong>Customer Name: {{$customer->name}}</strong><br>
                                            Address: {{$customer->address}}<br>
                                            City: {{$customer->city}}<br>
                                            Phone: {{$customer->phone}}
                                        </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> {{date('F j, Y')}}</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                        <p class="m-t-10"><strong>Order ID: </strong>#{{date('d-m-y')}}_{{$orders->id}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                            <tr><th>#</th>
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr></thead>
                                            <tbody>
                                            @php
                                            $i=1;
                                            @endphp
                                            @foreach ($orderDetails as $order)
                                                <tr>
                                                    <td>{{ $i ++ }}</td>
                                                    <td>{{ $order->name }}</td>
                                                    <td>{{ $order->quantity}}</td>
                                                    <td>{{ $order->price }}</td>
                                                    <td>{{ $order->total}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-3 pull-left">
                                    <h3 class="text-left">Payment:{{$orders->payment_status}}</h3>
                                    <p class="text-left"><b>Paid: </b> {{$orders->paid}}</p>
                                    <p class="text-left"><b>Due:  </b>{{$orders->due}}</p>
                                </div>
                                <div class="col-md-3 col-md-offset-9">
                                    <p class="text-right"><b>Sub-total:</b> {{$orders->sub_total}}</p>
                                    <p class="text-right">VAT: {{$orders->vat}}</p>
                                    <hr>
                                    <h3 class="text-right">Taka {{$orders->total}}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" onclick="printDiv('printableArea');" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script type="application/javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

@endsection
