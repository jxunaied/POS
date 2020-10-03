@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Diesel Inventory Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">inventory</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Diesel Inventory Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('diesel-inventory.create') }}"> Add Info</a>
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
                        <th>Added Date</th>
                        <th>Amount(lr/dram)</th>
                        <th>Remarks</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($invs as $inv)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $inv->added_date }}</td>
                            <td>{{ $inv->diesel_amount }}</td>
                            <td>{{ $inv->remarks }}</td>
                            <td>
                                <form action="{{ route('diesel-inventory.destroy',$inv->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('diesel-inventory.edit',$inv->id) }}">Edit</a>
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

    {!! $invs->links() !!}

@endsection
