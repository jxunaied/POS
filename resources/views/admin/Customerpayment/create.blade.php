
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New Payment</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('customer-payment.index') }}">customer</a></li>
                            <li class="active">create</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Payment Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Invoice No</label>
                                        <input type="text" name="invoice_no" class="form-control" placeholder="Invoice No" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Original Amount</label>
                                        <input type="number" name="original_amount" class="form-control" placeholder="Original Amount" >
                                    </div>
                                    <div class="form-group">
                                        <label>Cus Name</label>
                                        <input type="number" name="cus_id" class="form-control" placeholder="cus_id" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Paid Date</label>
                                        <input type="date" name="paid_date" class="form-control" placeholder="Paid Date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Paid Amount</label>
                                        <input type="number" name="paid_amount" class="form-control" placeholder="Paid Amount" >
                                    </div>
                                    <div class="form-group">
                                        <label>Current Due</label>
                                        <input type="number" name="current_due" class="form-control" placeholder="Current Due" >
                                    </div>
                                   {{-- <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" name="remarks" class="form-control" placeholder="Remarks" >
                                    </div>--}}
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add Payment</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
