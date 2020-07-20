
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New Employee</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('employee.index') }}">employee</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">Employee Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <label>Experience</label>
                                        <input type="text" name="experience" class="form-control" placeholder="Experience" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="text" name="salary" class="form-control" placeholder="Salary" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Assigned Vacation</label>
                                        <input type="text" name="vacation" class="form-control" placeholder="Vacation" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Join Date</label>
                                        <input type="text" name="joining" class="form-control" placeholder="Join Date" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Leave Date</label>
                                        <input type="text" name="leave" class="form-control" placeholder="Leave Date">
                                    </div>
                                    <div class="form-group">
                                        <label>Employee Photo</label>
                                        <input type="file" name="photo" accept="image/*" class="upload" required>
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add Employee</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
