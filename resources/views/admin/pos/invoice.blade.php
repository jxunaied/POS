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
                                        <strong>Added After Confirmation</strong>
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
                                        <p class="m-t-10"><strong>Order ID: </strong>#Added After Confirmation</p>
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
                                   <a href="#" class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{url('/create-payments')}}" method="post">
    @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Payment Information</h4>
                    <span class="modal-title"><strong>Tk. {{Cart::total()}}</strong></span>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Payment Type</label>
                                <select name="payment_type" required>
                                    <option>Cash</option>
                                    <option>Check</option>
                                    <option>Due</option>
                                    <option>Advance</option>
                                    <option>Cash On Delivery</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Paid</label>
                                <input type="number" step=0.01 name="paid" class="form-control" id="field-2" placeholder="Pay" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Due</label>
                                <input type="number" step=0.01 name="due" class="form-control" id="field-3" placeholder="Due" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Remarks</label>
                                <textarea type="text" name="remarks" class="form-control" id="field-2" placeholder="Remarks"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="cus_id" value="{{$customer->id}}">
                <input type="hidden" name="sales_date" value="{{date('d/m/y')}}">
                <input type="hidden" name="discount_amount" step=0.01 value="0">
                <input type="hidden" type="number" step=0.01 name="total" value="{{Cart::total()}}">
                <input type="hidden" type="number" step=0.01 name="subtotal" value="{{Cart::subtotal()}}">
                <input type="hidden" type="number" step=0.01 name="vat" value="{{Cart::tax()}}">

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info waves-effect waves-light">Confirm</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
</form>

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
