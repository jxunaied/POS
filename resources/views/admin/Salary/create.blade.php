
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New salary</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('salary.index') }}">salary</a></li>
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
                            <div class="panel-heading"><h3 class="panel-title">salary Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('salary.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Employee</label>

                                        <select name="employee_id" class="form-control">
                                            <option value="" disabled selected>Select Employee</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="form-group">
                                                <label>Month</label>
                                                <select name="salary_month" class="form-control">
                                                    <option value="" selected disabled>Select a month</option>
                                                    <option value="january">January</option>
                                                    <option value="february">February</option>
                                                    <option value="march">March</option>
                                                    <option value="april">April</option>
                                                    <option value="may">May</option>
                                                    <option value="june">June</option>
                                                    <option value="july">July</option>
                                                    <option value="august">August</option>
                                                    <option value="september">September</option>
                                                    <option value="october">October</option>
                                                    <option value="november">November</option>
                                                    <option value="december">December</option>
                                                </select>
                                            </div>
                                    </div>                                                                  
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="text" name="salary_year" class="form-control" placeholder="Year" >
                                    </div>
                                    <div class="form-group">
                                        <label>Paid Amount</label>
                                        <input type="text" name="paid_amount" class="form-control" placeholder="Amount Paid" >
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add salary</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
