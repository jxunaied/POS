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
        $ProductCategorys = ProductCategory::latest()->paginate(12);
        return view('admin.productcategory.index', compact('ProductCategorys'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.ProductCategory.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "parentid"=>"required",
            
        ]);
        $ProductCategory = new ProductCategory();
        $ProductCategory->parentid = $request->input('parentid');        
        $ProductCategory->name = $request->input('name');
        $ProductCategory->save();

        return redirect()->route('productcategory.index')
            ->with('success','ProductCategory added successfully.');

    }

    public function show(ProductCategory $productcategory)
    {
        return view('admin.ProductCategory.show', compact('productcategory'));
    }

    public function edit(ProductCategory $productcategory)
    {
        return view('admin.ProductCategory.edit',compact('productcategory'));
    }

    public function update(Request $request, ProductCategory $ProductCategory)
    {
       $request->validate([
            "name"=>"required | min:3",
            "parentid"=>"required",
        ]);


        $ProductCategory = new ProductCategory();
        $ProductCategory->name = $request->input('name');
        $ProductCategory->parentid = $request->input('parentid');
        $ProductCategory->save();
        return redirect()->route('ProductCategory.index')->with('success','ProductCategory information updated successfully');

    }


    public function destroy(ProductCategory $ProductCategory)
    {
        $ProductCategory->delete();
        return redirect()->route('ProductCategory.index')
            ->with('success','ProductCategory information deleted successfully');

    }
}
