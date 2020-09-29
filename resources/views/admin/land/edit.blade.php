
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New Land</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('products.index') }}">Land</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">Land Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('land.update', $land->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Select Land Owner</label>
                                        <select name="soil_sorder_id" class="form-control" required>
                                            <option value="" disabled selected>Select Owner</option>
                                            @foreach($owners as $owner)
                                                @if($owner->id == $land->land_owners_id)
                                                    <option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
                                                @else
                                                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kata</label>
                                        <input type="text" value="{{ $land->kata }}" name="kata" class="form-control" placeholder="Kata" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Decimal</label>
                                        <input type="text" value="{{ $land->decimal }}" name="decimal" class="form-control" placeholder="Decimal" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Remarks</label>
                                        <input type="text" value="{{ $land->remarks }}" name="remarks" class="form-control" placeholder="Remarks" >
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
