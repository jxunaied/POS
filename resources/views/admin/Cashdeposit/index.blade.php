@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Cash Deposit Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">deposit</li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Deposit Information</h2>
                        </div>
                        <div class="pull-right">
                                <form action="{{ route('cashdeposit.filter') }}" method="get" class="d-flex">
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
                            <a class="btn btn-success" href="{{ route('cashdeposit.month') }}">This Month</a>
                        </div>
                        <div class="pull-right mr-2">
                            <a class="btn btn-success" href="{{ route('cashdeposit.year') }}">This Year</a>
                        </div>
                        <div class="pull-right mr-2">
                            <a class="btn btn-success" href="{{ route('cashdeposit.create') }}"> Add Cash Deposit</a>
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
                        <th>Deposit Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($deposits as $deposit)
                        <tr>
                            <td>{{ ++$i }}</td>
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
    {!! $deposits->links() !!}
@endsection
