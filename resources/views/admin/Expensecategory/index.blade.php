@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">expensecategorys Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">expensecategory</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All expensecategory Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('expensecategory.create') }}"> Create New expensecategory</a>
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
                        <th>No.</th>
                        <th>parent id</th>                        
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($expensecategorys as $expensecategory)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $expensecategory->parent_id }}</td>
                            <td>{{ $expensecategory->name }}</td>

                            <td>
                                <form action="{{ route('expensecategory.destroy',$expensecategory->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('expensecategory.show',$expensecategory->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('expensecategory.edit',$expensecategory->id) }}">Edit</a>

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

    {!! $expensecategorys->links() !!}

@endsection
