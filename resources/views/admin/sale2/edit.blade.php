
@extends('layouts.app')

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sale Information {{$sale->date}}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sale2.index') }}"> Back</a>
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

    <form action="{{ route('sale2.update',$sale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group">
                <label>Quantity of bricks</label>
                <input type="text" name="qty_bricks" value="{{$sale->qty_bricks}}"  class="form-control" placeholder="Quantity of bricks" required>
            </div>
            <div class="form-group">
                <label>Opening Balance</label>
                <input type="text" name="opening_balance"   value="{{$sale->opening_balance}}"  class="form-control" placeholder="Opening Balance">
            </div>
            <div class="form-group">
                <label>Cash Sale</label>
                <input type="text" name="cash_sale" value="{{$sale->cash_sale}}"  class="form-control" placeholder="Cash Sale">
            </div>
            <div class="form-group">
                <label>Dues</label>
                <input type="text" name="dues" value="{{$sale->dues}}"  class="form-control" placeholder="Dues">
            </div>
            <div class="form-group">
                <label>Account Receivable</label>
                <input type="text" name="acc_receivable" value="{{$sale->acc_receivable}}"  class="form-control" placeholder="Account Receivable">
            </div>
            <div class="form-group">
                <label>Advance</label>
                <input type="text" name="advance" value="{{$sale->advance}}"  class="form-control" placeholder="Advance">
            </div>
            <div class="form-group">
                <label>Expense</label>
                <input type="text" name="expense" value="{{$sale->expense}}"  class="form-control" placeholder="Expense">
            </div>
            <div class="form-group">
                <label>Deposits</label>
                <input type="text" name="deposits" value="{{$sale->deposits}}"  class="form-control" placeholder="Deposits">
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
