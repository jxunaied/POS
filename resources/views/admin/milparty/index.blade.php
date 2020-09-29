@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Mil Party Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">MilParty</li>
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
                                            <h4>All Mil Party Information</h4>
                                        </div>
                                        <div class="pull-right">
                                            <a class="btn btn-success" href="{{ route('milparty.create') }}"> Add New Mil Party</a>
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
                                                        <th>Balance</th>
                                                        <th>Due</th>
                                                        <th width="280px">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($owners as $owner)
                                                    <tr>
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $owner->name }}</td>
                                                        <td>{{ $owner->balance }}</td>
                                                        <td>{{ $owner->due }}</td>
                                                        <td>
                                                            <form action="{{ route('milparty.destroy', $owner->id) }}" method="POST">
                                                                <a class="btn btn-primary" href="{{ route('milparty.edit', $owner->id) }}">Edit</a>
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

    {!! $owners->links() !!}

@endsection
