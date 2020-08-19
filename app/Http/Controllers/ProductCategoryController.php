<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $productcategorys = ProductCategory::latest()->paginate(12);
        return view('admin.productcategory.index', compact('productcategorys'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.productcategory.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "parentid"=>"required",
            
        ]);
        $productcategory = new ProductCategory();
        $productcategory->parentid = $request->input('parentid');
        $productcategory->name = $request->input('name');
        $productcategory->save();

        return redirect()->route('productcategory.index')
            ->with('success','ProductCategory added successfully.');

    }

    public function show(ProductCategory $productcategory)
    {
        return view('admin.productcategory.show', compact('productcategory'));
    }

    public function edit(ProductCategory $productcategory)
    {
        return view('admin.productcategory.edit',compact('productcategory'));
    }

    public function update(Request $request, ProductCategory $productcategory)
    {
       $request->validate([
            "name"=>"required | min:3",
            "parentid"=>"required",
        ]);


        
        $productcategory->update($request->all());
        return redirect()->route('productcategory.index')->with('success','ProductCategory information updated successfully');

    }


    public function destroy(ProductCategory $productcategory)
    {
        $productcategory->delete();
        return redirect()->route('productcategory.index')
            ->with('success','ProductCategory information deleted successfully');

    }
}
