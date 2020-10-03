
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Edit Info</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('brick.index') }}">brick</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">Brick Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('brick.update', $brick->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Select Mil Party</label>
                                        <select name="mil_party_id" class="form-control" required>
                                            <option value="" disabled selected>Select Party</option>
                                            @foreach($milaprty as $owner)
                                                @if($owner->id == $brick->mil_party_id)
                                                    <option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
                                                @else
                                                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" value="{{ $brick->date }}" name="date" class="form-control" placeholder="Date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Decimal</label>
                                        <input type="text" value="{{ $brick->brick_amount }}" name="brick_amount" class="form-control" placeholder="Brick Amount" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Payable</label>
                                        <input type="text" value="{{ $brick->payable }}" name="payable" class="form-control" placeholder="Payable" >
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
