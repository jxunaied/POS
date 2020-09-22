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

                <table class="table table-bordered">
                    <tr>
                        <th>Expense Title</th>
                        <th>Expense Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>remarks</th>

                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($expenses as $expense)
                        <tr>
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

@endsection
