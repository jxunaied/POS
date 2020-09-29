@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Sand Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">sand</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Sand Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('sand.create') }}"> Add Info</a>
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
                        <th>Drum Truck</th>
                        <th>TC</th>
                        <th>Quantity(cft)</th>
                        <th>Rate</th>
                        <th>Truck Fair</th>
                        <th>Total Amount</th>
                        <th>Place Name</th>
                        <th>Remarks</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($sands as $sand)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $sand->date }}</td>
                            <td>{{ $sand->drum_truck }}</td>
                            <td>{{ $sand->tc }}</td>
                            <td>{{ $sand->quantity_cft }}</td>
                            <td>{{ $sand->rate }}</td>
                            <td>{{ $sand->truck_fair }}</td>
                            <td>{{ $sand->total_amount }}</td>
                            <td>{{ $sand->place_name }}</td>
                            <td>{{ $sand->remarks }}</td>
                            <td>
                                <form action="{{ route('sand.destroy',$sand) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('sand.edit',$sand) }}">Edit</a>
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

    {!! $sands->links() !!}

@endsection
