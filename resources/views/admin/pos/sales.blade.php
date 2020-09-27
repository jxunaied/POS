@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Orders Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">sales</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Orders Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{url('/pos')}}">POS</a>
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
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Discount</th>
                        <th>Vat</th>
                        <th>Total</th>
                        <th>Payment Type</th>
                        <th width="280px">Action</th>
                    </tr>
                    @php
                    $i=0;
                    @endphp
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $order->sales_date }}</td>
                            <td>{{ $order->name}}</td>
                            <td>{{ $order->discount_amount}}</td>
                            <td>{{ $order->vat}}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>
                                <form action="{{ url('/delete-order',$order->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ url('sales-details',$order->id) }}">Show</a>
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

    {!! $orders->links() !!}

@endsection

