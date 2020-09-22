
@extends('layouts.app')

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Add New Product</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{ route('products.index') }}">Product</a></li>
                            <li class="active">create</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
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
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Product Information</h3></div>
                            <div class="panel-body">
                                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name" >
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Category Name:</strong>
                                            <select name="category_id" class="form-control">
                                                <option value="" disabled selected>Select a Category</option>
                                                @foreach($categories as $category)
                                                    @if($category->id == $product->category_id)
                                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                    @else
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price" >
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input type="number" name="quantity_available" value="{{ $product->quantity_available }}" class="form-control" placeholder="Quantity" >
                                    </div>
                                    <div class="form-group">
                                        <label>Unit Name</label>
                                        <input type="text" name="unit_name"  value="{{ $product->unit_name }}" class="form-control" placeholder="Unit Name" >
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Add Product</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                </div> <!-- End row -->
            </div>
        </div>
    </div>
@endsection
