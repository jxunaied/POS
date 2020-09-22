
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Cash Deposit</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('salary.index') }}">deposit</a></li>
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
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Cash Deposit Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('cashdeposit.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Deposit Date</label>
                                        <input type="date" name="deposit_date" class="form-control" placeholder="Date" >
                                    </div>
                                    <div class="form-group">
                                        <label>From</label>
                                        <input type="text" name="from" class="form-control" placeholder="From" >
                                    </div>
                                    <div class="form-group">
                                        <label>To</label>
                                        <input type="text" name="to" class="form-control" placeholder="to" >
                                    </div>
                                   <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="form-control" placeholder="Amount" >
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" name="remarks" class="form-control" placeholder="Remarks" >
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
