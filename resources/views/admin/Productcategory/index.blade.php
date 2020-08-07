@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">ProductCategorys Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">ProductCategory</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All ProductCategory Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('productcategory.create') }}"> Create New ProductCategory</a>
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
                        <th>parentId</th>                        
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($ProductCategorys as $ProductCategory)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $ProductCategory->parentid }}</td>
                            <td>{{ $ProductCategory->name }}</td>

                            <td>
                                <form action="{{ route('productcategory.destroy',$ProductCategory->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('productcategory.show',$ProductCategory->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('productcategory.edit',$ProductCategory->id) }}">Edit</a>

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

    {!! $ProductCategorys->links() !!}

@endsection
