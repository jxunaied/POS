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
                                <form action="{{route('salary.filter')}}" method="get" class="d-flex">
                                    <select name="month" class="form-control">
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
                                    <input type="number" name="year" placeholder="Year">
                                    <input type="submit" value="Filter">
                                </form>
                        </div>
                        <div class="pull-right mr-2">
                            <a class="btn btn-success" href="{{ route('salary.month') }}">This Month</a>
                        </div>
                        <div class="pull-right mr-2">
                            <a class="btn btn-success" href="{{ route('salary.year') }}">This Year</a>
                        </div>
                        <div class="pull-right mr-2">
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
                        <th>Employee name</th>
                        <th>Salary Month</th>
                        <th>Salary Year</th>
                        <th>Paid Amount</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($salarys as $salary)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $salary->employee_name->name }}</td>
                            <td>{{ ucfirst($salary->salary_month) }}</td>
                            <td>{{ $salary->salary_year }}</td>
                            <td>{{ $salary->paid_amount }}</td>
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
    {!! $salarys->links() !!}
@endsection
