@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">salarys Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">salary</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All salary Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('salary.create') }}"> Create New salary</a>
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
                        <th>No.</th>
                        <th>employee_id</th>                        
                        <th>salary_month</th>
                        <th>salary_year</th>
                        <th>paid_amount</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($salarys as $salary)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $salary->employee_id }}</td>
                            <td>{{ $salary->salary_month }}</td>
                            <td>{{ $salary->salary_year }}</td>
                            <td>{{ $salary->paid_amount }}</td>

                            <td>
                                <form action="{{ route('salary.destroy',$salary->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('salary.show',$salary->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('salary.edit',$salary->id) }}">Edit</a>

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

    {!! $salarys->links() !!}

@endsection
