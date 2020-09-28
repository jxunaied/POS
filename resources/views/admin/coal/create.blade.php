
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New Info</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('coal.index') }}">coal</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">Coal Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('coal.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Supplier</label>
                                        <select name="supplier_id" class="form-control" required>
                                            <option value="" disabled selected>Select Supplier</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Truck No</label>
                                        <input type="text" name="truck_no" class="form-control" placeholder="truck no" required >
                                    </div>
                                    <div class="form-group">
                                        <label>Chalan No.</label>
                                        <input type="text" name="chalan_no" class="form-control" placeholder="chalan no" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input type="number" name="rate" class="form-control" placeholder="rate" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity" class="form-control" placeholder="quantity" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Truck Fair</label>
                                        <input type="number" name="truck_fair" class="form-control" placeholder="Truck Fair" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Place Name</label>
                                        <input type="text" name="place_name" class="form-control" placeholder="Place Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <input type="date" name="purchase_date" class="form-control" placeholder="purchase date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" name="remarks" class="form-control" placeholder="remarks">
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
