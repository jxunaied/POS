
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
                            <li><a href="{{ route('diesel-uses.index') }}">dieseluses</a></li>
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
                                <form action="{{ route('diesel-uses.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Uses</label>
                                        <select name="party_id" class="form-control" required>
                                            <option value="" disabled selected>Select Mil</option>
                                            @foreach($mils as $mil)
                                                <option value="{{ $mil->id }}">{{ $mil->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="date" class="form-control" placeholder="Date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Amount Uses</label>
                                        <input type="text"  name="amount" class="form-control" placeholder="Uses Amount" required>
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
