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

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>name</th>
                        <th>category_id</th>
                        <th>amount</th>
                        <th>remarks</th>

                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($expenses as $expense)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $expense->name }}</td>
                            <td>{{ $expense->category_id }}</td>
                            <td>{{ $expense->amount }}</td>
                            <td>{{ $expense->address }}</td>
                            <td>{{ $expense->remarks }}</td>

                            <td>
                                <form action="{{ route('expense.destroy',$expense->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('expense.show',$expense->id) }}">Show</a>

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
