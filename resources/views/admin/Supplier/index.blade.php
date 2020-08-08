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
                        <th>photo</th>
                        <th>name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>city</th>
                        <th>type</th>
                        <th>shop_name</th>
                        <th>account_holder</th>
                        <th>account_number</th>
                        <th>bank_name</th>
                        <th>bank_branch</th>
                        <th>balance</th>
                        <th>due</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>
                                <img class="img-rounded" style="height:35px; width: 35px;" src="{{ URL::asset("storage/supplier/".$supplier->photo) }}" alt="{{ $supplier->name }}">
                            </td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->city }}</td>
                            <td>{{ $supplier->type }}</td>
                            <td>{{ $supplier->shop_name }}</td>
                            <td>{{ $supplier->account_holder }}</td>
                            <td>{{ $supplier->account_number }}</td>
                            <td>{{ $supplier->bank_name }}</td>
                            <td>{{ $supplier->bank_branch }}</td>
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
