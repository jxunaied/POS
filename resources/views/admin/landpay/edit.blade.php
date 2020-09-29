
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New Product</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('land-pay.index') }}">Payment</a></li>
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
                                <form action="{{ route('land-pay.update', $payment->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Select Land Owner</label>
                                        <select name="land_owners_id" class="form-control" required>
                                            <option value="" disabled selected>Select Land Owner</option>
                                            @foreach($owners as $owner)
                                                @if($owner->id == $payment->land_owners_id)
                                                    <option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
                                                @else
                                                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Date</label>
                                        <input type="date" value="{{ $payment->payment_date }}" name="payment_date" class="form-control" placeholder="Date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" value="{{ $payment->year }}" name="year" class="form-control" placeholder="Year" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Amount</label>
                                        <input type="number" value="{{ $payment->amount }}" name="amount" class="form-control" placeholder="Payment Amount" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" value="{{ $payment->remarks }}" name="remarks" class="form-control" placeholder="Remarks" >
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
