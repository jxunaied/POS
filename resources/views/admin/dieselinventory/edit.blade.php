
@extends('layouts.app')

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Diesel Inventory Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('diesel-inventory.index') }}"> Back</a>
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

    <form action="{{ route('diesel-inventory.update',$inv[0]->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="added_date" value="{{$inv[0]->added_date}}" class="form-control" placeholder="Date"  required>
        </div>
        <div class="form-group">
            <label>Diesel Amount</label>
            <input type="text" name="diesel_amount" value="{{$inv[0]->diesel_amount}}" class="form-control" placeholder="diesel amount"  >
        </div>

        <div class="form-group">
            <label>Remarks</label>
            <input type="text" value="{{$inv[0]->remarks}}" name="remarks" class="form-control" placeholder="remarks">
        </div>
        <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>

    </form>
</div>
</div>
</div>
@endsection
