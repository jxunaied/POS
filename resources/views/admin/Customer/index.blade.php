@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">customers Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">customer</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All customer Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('customer.create') }}"> Create New customer</a>
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
                        <th>shop_name</th>
                        <th>nid_no</th>
                        <th>account_holder</th>
                        <th>account_number</th>
                        <th>bank_name</th>
                        <th>bank_branch</th>
                        <th>balance</th>
                        <th>due</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>
                                <img class="img-rounded" style="height:35px; width: 35px;" src="{{ URL::asset("storage/customer/".$customer->photo) }}" alt="{{ $customer->name }}">
                            </td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->city }}</td>
                            <td>{{ $customer->shop_name }}</td>
                            <td>{{ $customer->nid_no }}</td>
                            <td>{{ $customer->account_holder }}</td>
                            <td>{{ $customer->account_number }}</td>
                            <td>{{ $customer->bank_name }}</td>
                            <td>{{ $customer->bank_branch }}</td>
                            <td>{{ $customer->balance }}</td>
                            <td>{{ $customer->due }}</td>

                            <td>
                                <form action="{{ route('customer.destroy',$customer->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('customer.show',$customer->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('customer.edit',$customer->id) }}">Edit</a>

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

    {!! $customers->links() !!}

@endsection
