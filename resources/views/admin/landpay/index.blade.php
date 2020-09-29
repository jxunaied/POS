@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Land Owner Payment Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">payment</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Payment Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('land-pay.create') }}"> Create New Info</a>
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
                        Payment LISTS
                    </h3>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Serial</th>
                        <th>Land Owner Name</th>
                        <th>Payment Date</th>
                        <th>Year(Annual basis)</th>
                        <th>Paid Amount</th>
                        <th>Remarks</th>
                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $payment->ownerName->name }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->year }}</td>
                            <td>{{ $payment->amount }}</td>
                            <td>{{ $payment->remarks }}</td>
                            <td>
                                <form action="{{ route('land-pay.destroy', $payment->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('land-pay.edit', $payment->id) }}">Edit</a>
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

    {!! $payments->links() !!}

@endsection
