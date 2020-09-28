@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Coal Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">coal</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Coal Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('coal.create') }}"> Add Info</a>
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
                        <th>Supplier</th>
                        <th>Truck No</th>
                        <th>Chalan No</th>
                        <th>Rate</th>
                        <th>Quantity</th>
                        <th>Truck Fair</th>
                        <th>Total Amount</th>
                        <th>Place Name</th>
                        <th>Purchase Date</th>
                        <th>Remarks</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($coals as $coal)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $coal->supplierName->name }}</td>
                            <td>{{ $coal->truck_no }}</td>
                            <td>{{ $coal->chalan_no }}</td>
                            <td>{{ $coal->rate }}</td>
                            <td>{{ $coal->quantity }}</td>
                            <td>{{ $coal->truck_fair }}</td>
                            <td>{{ $coal->total_amount }}</td>
                            <td>{{ $coal->place_name }}</td>
                            <td>{{ $coal->purchase_date }}</td>
                            <td>{{ $coal->remarks }}</td>
                            <td>
                                <form action="{{ route('coal.destroy',$coal) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('coal.edit',$coal) }}">Edit</a>
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

    {!! $coals->links() !!}

@endsection
