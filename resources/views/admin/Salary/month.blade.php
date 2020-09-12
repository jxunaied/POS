@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Salary Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">salary</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Monthly Salary Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('salary.create') }}">Add Salary</a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="card-header">
                    <h3 class="card-title">
                        Salary List
                        <small class="text-danger pull-right">Total Paid Salary : {{ $salaries->sum('paid_amount') }} Taka</small>
                    </h3>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Employee Name</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Amount</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($salaries as $salary)
                        <tr>
                            <td>{{ $salary->employee_name->name }}</td>
                            <td>{{ $salary->salary_month }}</td>
                            <td>{{ $salary->salary_year }}</td>
                            <td>{{ number_format($salary->paid_amount, 2) }}</td>
                            <td>
                                <form action="{{ route('salary.destroy',$salary->id) }}" method="POST">
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

@endsection

