@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Land Information</h4>
                        <ol class="breadcrumb pull-right">
                            <li class="active">land</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>All Land Information</h2>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('land.create') }}"> Create New Info</a>
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
                        Land LISTS
                    </h3>
                </div>
                <table class="table table-bordered">
                    <tr>
                        <th>Serial</th>
                        <th>Land Owner Name</th>
                        <th>Kata</th>
                        <th>Decimal</th>
                        <th>Remarks</th>
                        <th width="200px">Action</th>
                    </tr>
                    @foreach ($lands as $land)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $land->ownerName->name }}</td>
                            <td>{{ $land->kata }}</td>
                            <td>{{ $land->decimal }}</td>
                            <td>{{ $land->remarks }}</td>
                            <td>
                                <form action="{{ route('land.destroy', $land->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('land.edit', $land) }}">Edit</a>
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

    {!! $lands->links() !!}

@endsection
