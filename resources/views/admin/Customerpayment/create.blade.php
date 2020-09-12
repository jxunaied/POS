
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New customer</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('customer.index') }}">customer</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">customer Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" >
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" placeholder="City" >
                                    </div>
                                    <div class="form-group">
                                        <label>Shop Name</label>
                                        <input type="text" name="shop_name" class="form-control" placeholder="shop_name" >
                                    </div>
                                    <div class="form-group">
                                        <label>NID No.</label>
                                        <input type="text" name="nid_no" class="form-control" placeholder="nid_no" >
                                    </div>
                                    <div class="form-group">
                                        <label>Account Holder</label>
                                        <input type="text" name="account_holder" class="form-control" placeholder="account_holder" >
                                    </div>
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input type="text" name="account_number" class="form-control" placeholder="account_number">
                                    </div>
                                    <div class="form-group">
                                        <label>Bank Branch</label>
                                        <input type="text" name="bank_branch" class="form-control" placeholder="bank_branch" >
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add customer</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
