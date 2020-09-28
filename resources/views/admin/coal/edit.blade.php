
@extends('layouts.app')

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Coal Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('coal.index') }}"> Back</a>
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

    <form action="{{ route('coal.update',$coal->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Select Supplier</label>
            <select name="supplier_id" class="form-control" required>
                <option value="" disabled selected>Select Supplier</option>
                @foreach($suppliers as $supplier)
                    @if($supplier->id == $coal->supplier_id)
                        <option value="{{ $supplier->id }}" selected>{{ $supplier->name }}</option>
                    @else
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Truck No</label>
            <input type="text" name="truck_no" value="{{$coal->truck_no}}" class="form-control" placeholder="truck no" required >
        </div>
        <div class="form-group">
            <label>Chalan No.</label>
            <input type="text" value="{{$coal->chalan_no}}" name="chalan_no" class="form-control" placeholder="chalan no" required>
        </div>
        <div class="form-group">
            <label>Rate</label>
            <input type="number" value="{{$coal->rate}}" name="rate" class="form-control" placeholder="rate" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" value="{{$coal->quantity}}" name="quantity" class="form-control" placeholder="City" required>
        </div>
        <div class="form-group">
            <label>Truck Fair</label>
            <input type="number" value="{{$coal->truck_fair}}" name="truck_fair" class="form-control" placeholder="Truck Fair" >
        </div>
        <div class="form-group">
            <label>Place Name</label>
            <input type="text" value="{{$coal->place_name}}" name="place_name" class="form-control" placeholder="Place Name" >
        </div>
        <div class="form-group">
            <label>Purchase Date</label>
            <input type="date" value="{{$coal->purchase_date}}" name="purchase_date" class="form-control" placeholder="purchase date" >
        </div>
        <div class="form-group">
            <label>Remarks</label>
            <input type="text" value="{{$coal->remarks}}" name="remarks" class="form-control" placeholder="remarks">
        </div>
        <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>

    </form>
</div>
</div>
</div>
@endsection
