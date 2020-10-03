
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
                            <li><a href="{{ route('mati.index') }}">mati</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('mati.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Soil Sordar</label>
                                        <select name="soil_sorder_id" class="form-control" required>
                                            <option value="" disabled selected>Select a Sordar</option>
                                            @foreach($sordars as $sordar)
                                                <option value="{{ $sordar->id }}">{{ $sordar->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Measurement</label>
                                        <input type="text" name="measurement" class="form-control" placeholder="measurement" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Cft</label>
                                        <input type="number"  name="total_cft" class="form-control" placeholder="total cft" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Rate</label>
                                        <input type="number" name="rate" class="form-control" placeholder="Rate" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="form-control" placeholder="amount" required>
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
