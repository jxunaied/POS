
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
                            <li><a href="{{ route('sand.index') }}">sand</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">Sand Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('sand.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control" placeholder="Date" required >
                                    </div>
                                    <div class="form-group">
                                        <label>Drum Truck</label>
                                        <input type="text" name="drum_truck" class="form-control" placeholder="drum truck" >
                                    </div>
                                    <div class="form-group">
                                        <label>TC</label>
                                        <input type="text" name="tc" class="form-control" placeholder="TC" >
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity Cft</label>
                                        <input type="text" name="quantity_cft" class="form-control" placeholder="quantity cft" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input type="text" name="rate" class="form-control" placeholder="Rate" required>
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
