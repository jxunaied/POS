@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Sale Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">sale</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Sale Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('sale2.create') }}"> Create New Info</a>
                        </div>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-header">
                    <div class="pull-right">
                        <form action="{{ route('sale2.filter') }}" method="get" class="d-flex">
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
                        <a class="btn btn-success" href="{{ route('sale2Months') }}">This Month</a>
                    </div>
                    <div class="pull-right mr-2">
                        <a class="btn btn-success" href="{{ route('sale2Years') }}">This Year</a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sale</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Quantity(bricks)</th>
                                                <th>Opening Balance</th>
                                                <th>Cash Sale</th>
                                                <th>Dues</th>
                                                <th>Acc Receivable</th>
                                                <th>Advance</th>
                                                <th>Gross Sales</th>
                                                <th>Expense</th>
                                                <th>Net Sales</th>
                                                <th>Deposits</th>
                                                <th>Closing Balance</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @php $i = 0  @endphp
                                            @foreach ($sales as $sale)

                                                <tr>
                                                    <td>{{$sale->date}}</td>
                                                    <td>{{$sale->qty_bricks}}</td>
                                                    <td>{{$sale->opening_balance}}</td>
                                                    <td>{{$sale->cash_sale}}</td>
                                                    <td>{{$sale->dues}}</td>
                                                    <td>{{$sale->acc_receivable}}</td>
                                                    <td>{{$sale->advance}}</td>
                                                    <td>{{$sale->gross_sales}}</td>
                                                    <td>{{$sale->expense}}</td>
                                                    <td>{{$sale->net_sales}}</td>
                                                    <td>{{$sale->deposits}}</td>
                                                    <td>{{$sale->closing_balance}}</td>
                                                    <td>
                                                        @if ( $i == 0)
                                                            <form action="{{ route('sale2.destroy', $sale) }}" method="POST">

                                                                <a class="btn btn-primary" href="{{ route('sale2.edit', $sale->id) }}">Edit</a>
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                            @php $i ++  @endphp
                                                        @endif
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

                </div> <!-- End Row -->

            </div>
        </div>
    </div>

    {!! $sales->links() !!}

@endsection
