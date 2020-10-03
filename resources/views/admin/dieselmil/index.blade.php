@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Diesel Mil Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">diselmil</li>
                        </ol>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-lg-12 margin-tb">
                                        <div class="pull-left">
                                            <h4>All Diesel Mil Information</h4>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-success" href="{{ route('diesel.create') }}"> Add New Soil Sorder</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Name</th>
                                                        <th width="280px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($dieselmils as $mil)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $mil->name }}</td>
                                                        <td>
                                                            <form action="{{ route('diesel.destroy', $mil->id) }}" method="POST">
                                                                <a class="btn btn-primary" href="{{ route('diesel.edit', $mil->id) }}">Edit</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End row -->

            </div>
        </div>
    </div>

    {!! $dieselmils->links() !!}

@endsection
