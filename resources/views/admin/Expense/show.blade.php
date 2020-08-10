
@extends('layouts.app')
@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show expense Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('expense.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $expense->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>category_id:</strong>
                {{ $expense->category_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>amount:</strong>
                {{ $expense->amount }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>remarks:</strong>
                {{ $expense->remarks }}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection
