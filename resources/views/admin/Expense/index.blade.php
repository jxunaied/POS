@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Expenses Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">expense</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Expense Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('expense.create') }}"> Create New Expense</a>
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
                        EXPENSES LISTS
                        <small class="text-danger pull-right">Total Expenses : {{ $expenses->sum('amount') }} Taka</small>
                    </h3>
                </div>
                <div class="card-header">
                    <div class="pull-right">
                        <form action="{{ route('expense.filter') }}" method="get" class="d-flex">
                            <input type="date" name="date" placeholder="Date" style="width: 100%">
                            <select name="month" class="form-control">
                                <option value="" selected disabled>Select a month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                            <input type="number" name="year" placeholder="Year">
                            <input type="submit" value="Filter">
                        </form>
                    </div>
                    <div class="pull-right mr-2">
                        <a class="btn btn-success" href="{{ route('expense.months') }}">This Month</a>
                    </div>
                    <div class="pull-right mr-2">
                        <a class="btn btn-success" href="{{ route('expense.years') }}">This Year</a>
                    </div>

                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Serial</th>
                        <th>Expense Title</th>
                        <th>Expense Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>remarks</th>

                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $expense->name }}</td>
                            <td>{{ $expense->categoryName->name }}</td>
                            <td>{{ number_format($expense->amount, 2) }}</td>
                            <td>{{ $expense->date}}</td>
                            <td>{{ $expense->remarks }}</td>
                            <td>
                                <form action="{{ route('expense.destroy',$expense->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('expense.edit',$expense->id) }}">Edit</a>
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

    {!! $expenses->links() !!}

@endsection
