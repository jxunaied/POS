
@extends('layouts.app')

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit expense Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('expense.index') }}"> Back</a>
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

    <form action="{{ route('expense.update',$expense->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $expense->name }}" class="form-control" placeholder="Name">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>category_id:</strong>
                        <input type="email" name="category_id" value="{{ $expense->category_id }}"  class="form-control" placeholder="category_id" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>amount:</strong>
                        <input type="number" name="amount" value="{{ $expense->amount }}"  class="form-control" placeholder="amount" required>
                    </div>
                </div>                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>remarks:</strong>
                        <input type="text" name="remarks" value="{{ $expense->remarks }}"  class="form-control" placeholder="remarks">
                    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div>
</div>
</div>
@endsection
