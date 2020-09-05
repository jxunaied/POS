@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Employees Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">employee</li>
                        </ol>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            <h4>All Employee Information</h4>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>name</th>
                                                        <th>email</th>
                                                        <th>phone</th>
                                                        <th>address</th>
                                                        <th>experience</th>
                                                        <th>salary</th>
                                                        <th width="280px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($employees as $employee)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $employee->name }}</td>
                                                        <td>{{ $employee->email }}</td>
                                                        <td>{{ $employee->phone }}</td>
                                                        <td>{{ $employee->address }}</td>
                                                        <td>{{ $employee->experience }}</td>
                                                        <td>{{ $employee->salary }}</td>
                                                        <td>
                                                            <form action="{{ route('employee.destroy',$employee->id) }}" method="POST">
                                                                <a class="btn btn-info" href="{{ route('employee.show',$employee->id) }}">Show</a>

                                                                <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>

                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End row -->

            </div>
        </div>
    </div>

    {!! $employees->links() !!}

@endsection
