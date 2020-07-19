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
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Employee Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>photo</th>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>experience</th>
                        <th>salary</th>
                        <th>vacation</th>
                        <th>city</th>
                        <th>joining date</th>
                        <th>leave dare</th>

                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>
                                <img class="img-rounded" style="height:35px; width: 35px;" src="{{ URL::asset("storage/employee/".$employee->photo) }}" alt="{{ $employee->name }}">
                            </td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->experience }}</td>
                            <td>{{ $employee->salary }}</td>
                            <td>{{ $employee->vacation }}</td>
                            <td>{{ $employee->city }}</td>
                            <td>{{ $employee->joining }}</td>
                            <td>{{ $employee->leave }}</td>

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
                </table>
            </div>
        </div>
    </div>

    {!! $employees->links() !!}

@endsection
