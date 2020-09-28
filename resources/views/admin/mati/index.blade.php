@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Mati Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">mati</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Mati Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('mati.create') }}"> Create New Info</a>
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
                        Matis LISTS
                    </h3>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Serial</th>
                        <th>Soil Sordar Name</th>
                        <th>Measurement</th>
                        <th>Total cft</th>
                        <th>Rate</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($matis as $mati)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $mati->sorderName->name }}</td>
                            <td>{{ $mati->measurement }}</td>
                            <td>{{ $mati->total_cft }}</td>
                            <td>{{ $mati->rate }}</td>
                            <td>{{ $mati->amount }}</td>
                            <td>{{ $mati->remarks }}</td>
                            <td>
                                <form action="{{ route('mati.destroy', $mati->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('mati.edit', $mati) }}">Edit</a>
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

    {!! $matis->links() !!}

@endsection
