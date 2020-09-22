
@extends('layouts.app')

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cash Deposit Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cashdeposit.index') }}"> Back</a>
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
        <div class="row">
            <div class="col-md-2">
            </div>
        </div>
        <form action="{{ route('cashdeposit.update',$deposit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="col-xs-12 col-sm-12 col-md-12" >
                        <div class="form-group">
                            <strong>Deposit Date</strong>
                            <input type="date" name="deposit_date" value="{{ $deposit->deposit_date }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" >
                        <div class="form-group">
                            <strong>From</strong>
                            <input type="text" name="from" value="{{ $deposit->from }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" >
                        <div class="form-group">
                            <strong>To</strong>
                            <input type="text" name="to" value="{{ $deposit->to }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" >
                        <div class="form-group">
                            <strong>Amount</strong>
                            <input type="number" name="amount" value="{{ $deposit->amount }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" >
                        <div class="form-group">
                            <strong>Remarks</strong>
                            <input type="text" name="remarks" value="{{ $deposit->remarks }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
</div>
</div>
</div>

@endsection
