<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::latest()->paginate(12);
        return view('admin.products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $categories = ProductCategory::all();
        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"                  =>  "required",
            "category_id"           =>  "required",
            "price"                 =>  "required",
            "quantity_available"    =>  "required",
            "unit_name"             =>  "required",
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->quantity_available = $request->input('quantity_available');
        $product->unit_name = $request->input('unit_name');
        $product->save();

        return redirect()->route('products.index')
            ->with('success','Product added successfully.');

    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('admin.products.edit',compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name"                  =>  "required",
            "category_id"           =>  "required",
            "price"                 =>  "required",
            "quantity_available"    =>  "required",
            "unit_name"             =>  "required",
        ]);

        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->quantity_available = $request->input('quantity_available');
        $product->unit_name = $request->input('unit_name');
        $product->update();
        return redirect()->route('products.index')->with('success','Product information updated successfully');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
            ->with('success','Product information deleted successfully');

    }
}
