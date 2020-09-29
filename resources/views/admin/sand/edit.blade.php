
@extends('layouts.app')

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Sand Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sand.index') }}"> Back</a>
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

    <form action="{{ route('sand.update',$sand->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Date</label>
            <input type="date" name="date" value="{{$sand->date}}" class="form-control" placeholder="Date"  required>
        </div>
        <div class="form-group">
            <label>Drum Truck</label>
            <input type="text" name="drum_truck" value="{{$sand->drum_truck}}" class="form-control" placeholder="drum truck"  >
        </div>
        <div class="form-group">
            <label>TC</label>
            <input type="text" value="{{$sand->tc}}" name="tc" class="form-control" placeholder="tc" >
        </div>
        <div class="form-group">
            <label>Quantity CFT</label>
            <input type="number" value="{{$sand->quantity_cft}}" name="quantity_cft" class="form-control" placeholder="quantity cft" required>
        </div>
        <div class="form-group">
            <label>Rate</label>
            <input type="number" value="{{$sand->rate}}" name="rate" class="form-control" placeholder="rate" required>
        </div>
        <div class="form-group">
            <label>Truck Fair</label>
            <input type="number" value="{{$sand->truck_fair}}" name="truck_fair" class="form-control" placeholder="Truck Fair" >
        </div>
        <div class="form-group">
            <label>Place Name</label>
            <input type="text" value="{{$sand->place_name}}" name="place_name" class="form-control" placeholder="Place Name" >
        </div>
        <div class="form-group">
            <label>Remarks</label>
            <input type="text" value="{{$sand->remarks}}" name="remarks" class="form-control" placeholder="remarks">
        </div>
        <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>

    </form>
</div>
</div>
</div>
@endsection
