
@extends('layouts.app')
@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show ProductCategory Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('productcategory.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>parentId:</strong>
                {{ $productcategory->parentid }}
            </div>
        </div>       
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                {{ $productcategory->name }}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
