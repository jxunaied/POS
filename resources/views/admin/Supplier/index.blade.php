@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">suppliers Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">supplier</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All supplier Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('supplier.create') }}"> Create New supplier</a>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Shop Name</th>
                        <th>Balance</th>
                        <th>Due</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->city }}</td>
                            <td>{{ $supplier->shop_name }}</td>
                            <td>{{ $supplier->balance }}</td>
                            <td>{{ $supplier->due }}</td>
                            <td>
                                <form action="{{ route('supplier.destroy',$supplier->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('supplier.show',$supplier->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('supplier.edit',$supplier->id) }}">Edit</a>

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

    {!! $suppliers->links() !!}

@endsection
