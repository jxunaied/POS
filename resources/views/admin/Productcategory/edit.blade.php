
@extends('layouts.app')

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit ProductCategory Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productcategory.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productcategory.update',$productcategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ParentId:</strong>
                    <input type="text" name="parentid" value="{{ $productcategory->parentid }}" class="form-control" placeholder="ParentId">
                </div>        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name</strong>
                        <input type="text" name="name" value="{{ $productcategory->name }}"  class="form-control" placeholder="Name" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
        </div>
    </form>

</div>
</div>
</div>

@endsection
