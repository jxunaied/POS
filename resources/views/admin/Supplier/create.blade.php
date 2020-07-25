
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New supplier</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('supplier.index') }}">supplier</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">supplier Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
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
                                        <input type="text" name="city" class="form-control" placeholder="City" required>
                                    </div>
                                    <div class="form-group">
                                        <label>type</label>
                                        <input type="text" name="type" class="form-control" placeholder="type" required>
                                    </div>
                                    <div class="form-group">
                                        <label>shop name</label>
                                        <input type="text" name="shop_name" class="form-control" placeholder="shop_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>account holder</label>
                                        <input type="text" name="account_holder" class="form-control" placeholder="account_holder" required>
                                    </div>
                                    <div class="form-group">
                                        <label>account number</label>
                                        <input type="text" name="account_number" class="form-control" placeholder="account_number" required>
                                    </div>
                                    <div class="form-group">
                                        <label>bank name</label>
                                        <input type="text" name="bank_name" class="form-control" placeholder="bank_name">
                                    </div>
                                    <div class="form-group">
                                        <label>bank branch</label>
                                        <input type="text" name="bank_branch" class="form-control" placeholder="bank_branch" required>
                                    </div>
                                    <div class="form-group">
                                        <label>balance</label>
                                        <input type="text" name="balance" class="form-control" placeholder="balance" required>
                                    </div>
                                    <div class="form-group">
                                        <label>due</label>
                                        <input type="text" name="due" class="form-control" placeholder="due" required>
                                    </div>
                                    <div class="form-group">
                                        <label>supplier Photo</label>
                                        <input type="file" name="photo" accept="image/*" class="upload" required>
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add supplier</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
