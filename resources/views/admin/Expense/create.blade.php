
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New Expense</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('expense.index') }}">expense</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">Expense Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('expense.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category ID</label>
                                        <input type="text" name="category_id" class="form-control" placeholder="category id" required>
                                    </div>
                                    <div class="form-group">
                                        <label>amount</label>
                                        <input type="text" name="amount" class="form-control" placeholder="amount" required>
                                    </div>                            
                                    <div class="form-group">
                                        <label>remarks</label>
                                        <input type="text" name="remarks" accept="form-control" class="remarks" required>
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add Expense</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
