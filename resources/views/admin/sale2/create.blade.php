
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New Sale Info</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('sale2.index') }}">sale</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">Sales Information For <b>{{$date}}</b></h3></div>
                            <div class="panel-body">
                                <form action="{{ route('sale2.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Quantity of bricks</label>
                                        <input type="text" name="qty_bricks" class="form-control" placeholder="Quantity of bricks" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Opening Balance</label>
                                        <input type="text" name="opening_balance"  class="form-control" placeholder="Opening Balance">
                                    </div>
                                    <div class="form-group">
                                        <label>Cash Sale</label>
                                        <input type="text" name="cash_sale" class="form-control" placeholder="Cash Sale">
                                    </div>
                                    <div class="form-group">
                                        <label>Dues</label>
                                        <input type="text" name="dues" class="form-control" placeholder="Dues">
                                    </div>
                                    <div class="form-group">
                                        <label>Account Receivable</label>
                                        <input type="text" name="acc_receivable" class="form-control" placeholder="Account Receivable">
                                    </div>
                                    <div class="form-group">
                                        <label>Advance</label>
                                        <input type="text" name="advance" class="form-control" placeholder="Advance">
                                    </div>
                                    <div class="form-group">
                                        <label>Expense</label>
                                        <input type="text" name="expense" class="form-control" placeholder="Expense">
                                    </div>
                                    <div class="form-group">
                                        <label>Deposits</label>
                                        <input type="text" name="deposits" class="form-control" placeholder="Deposits">
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
