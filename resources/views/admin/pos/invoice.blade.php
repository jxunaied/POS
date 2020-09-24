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
                                        <strong>{{time()}}</strong>
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
                                            Phone: <abbr title="Phone"></abbr> {{$customer->phone}}
                                        </address>
                                    </div>
                                    <div class="pull-right m-t-30">
                                        <p><strong>Order Date: </strong> {{date('F j, Y')}}</p>
                                        <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                                        <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
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
                                            @foreach ($cartItems as $product)
                                                <tr>
                                                    <td>{{ $i ++ }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->qty }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->qty * $product->price}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-3 col-md-offset-9">
                                    <p class="text-right"><b>Sub-total:</b> {{Cart::subtotal()}}</p>
                                    {{--<p class="text-right">Discout: 12.9%</p>--}}
                                    <p class="text-right">VAT: {{Cart::tax()}}</p>
                                    <hr>
                                    <h3 class="text-right">Taka {{Cart::total()}}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" onclick="printDiv('printableArea');" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
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
