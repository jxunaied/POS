@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
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
                    <div class="col-lg-6">
                        <div class="price_card text-center">
                            <ul class="price-features">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Sub Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $cartProducts = Cart::content()
                                    @endphp
                                    @foreach ($cartProducts as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>
                                                <form action="{{url('/cart-update/'.$product->rowId)}}" method="post">
                                                    @csrf
                                                    <input type="number" name="qty" value="{{$product->qty}}">
                                                    <button type="submit" style="margin-top: -2px"><i class="fa fa-check"></i></button>
                                                </form>

                                            </td>
                                            <td>{{ $product->price * $product->qty }} </td>
                                            <td><a href="{{url('/cart-remove/'.$product->rowId )}}"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </ul>
                            <div class="pricing-header bg-purple">
                                <br>
                                <span class="name">Quantity: {{Cart::count()}}</span>
                                <span class="name">Sub Total: {{Cart::subtotal()}}</span>
                                <span class="name">Vat: {{Cart::tax()}}</span>
                                <hr>
                                <span class="price">Total: {{Cart::total()}}</span>
                            </div>
                            <form action="{{url('/invoice')}}" method="get">
                                @csrf
                                <div class="panel">
                                    <h5 class="text-info">Customers
                                        <a href="#" class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add Customers</a>
                                    </h5>
                                    <select class="from-control" name="customer_id">
                                        <option disabled="" selected="">Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-purple w-md waves-effect waves-light">Create Invoice</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-bordered">
                        <tr>
                            <th>Products Name</th>
                            <th>Price</th>
                            <th>Inventory</th>
                            <th width="100px">Action</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <form action="{{url('/cart-add')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" value="{{$product->name}}">
                                    <input type="hidden" name="qty" value="1">
                                    <input type="hidden" name="price" value="{{$product->price}}">
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity_available }} {{$product->unit_name}}</td>
                                    <td>
                                        <button type="submit" class="btn btn-danger">Add</button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
                         </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<form action="{{url('/customer-create')}}" method="POST">
    @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Customers</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" id="field-1" placeholder="Full Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Phone</label>
                                <input type="number" name="phone" class="form-control" id="field-2" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="field-3" class="control-label">Address</label>
                                <input type="text" name="address" class="form-control" id="field-3" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">City</label>
                                <input type="text" name="city" class="form-control" id="field-4" placeholder="City">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Add</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
</form>
@endsection
