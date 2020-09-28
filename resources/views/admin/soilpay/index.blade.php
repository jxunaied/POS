@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Soil Sordar Payment Information</h4>
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
                            <a class="btn btn-success" href="{{ route('mati-payment.create') }}"> Create New Info</a>
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
                        <th>Soil Sordar Name</th>
                        <th>Payment Date</th>
                        <th>Paid Amount</th>
                        <th>Remarks</th>
                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $payment->sorderName->name }}</td>
                            <td>{{ $payment->payment_date }}</td>
                            <td>{{ $payment->pay_amount }}</td>
                            <td>{{ $payment->remarks }}</td>
                            <td>
                                <form action="{{ route('mati-payment.destroy', $payment->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('mati-payment.edit', $payment->id) }}">Edit</a>
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
