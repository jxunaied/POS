@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Deposit Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">deposit</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Deposit Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('cashdeposit.create') }}">Add Deposit</a>
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
                        Deposit List
                        <small class="text-danger pull-right">Total Deposit Amount : {{ $deposits->sum('amount') }} Taka</small>
                    </h3>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Deposit Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($deposits as $deposit)
                        <tr>
                            <td>{{ $deposit->deposit_date }}</td>
                            <td>{{ ucfirst($deposit->from) }}</td>
                            <td>{{ ucfirst($deposit->to) }}</td>
                            <td>{{ $deposit->amount }}</td>
                            <td>{{ $deposit->remarks }}</td>
                            <td>
                                <form action="{{ route('cashdeposit.destroy',$deposit->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('cashdeposit.edit',$deposit) }}">Edit</a>
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

