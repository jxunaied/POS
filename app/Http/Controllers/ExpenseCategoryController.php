<?php

namespace App\Http\Controllers;

use App\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ExpenseCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $expensecategorys = ExpenseCategory::latest()->paginate(12);
        return view('admin.expensecategory.index', compact('expensecategorys'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $categories= ExpenseCategory::all();
        return view('admin.expensecategory.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            
        ]);
        $expensecategory = new ExpenseCategory();
        $expensecategory->parent_id = 0;
        $expensecategory->name = $request->input('name');
        $expensecategory->save();

        return redirect()->route('expensecategory.index')
            ->with('success','ExpenseCategory added successfully.');

    }

    public function show(ExpenseCategory $expensecategory)
    {
        return view('admin.expensecategory.show', compact('expensecategory'));
    }

    public function edit(ExpenseCategory $expensecategory)
    {
        return view('admin.expensecategory.edit',compact('expensecategory'));
    }

    public function update(Request $request, ExpenseCategory $expensecategory)
    {
       $request->validate([
            "name"=>"required | min:3",
            "parent_id"=>"required",
        ]);


        /*$ExpenseCategory = new ExpenseCategory();
        $ExpenseCategory->name = $request->input('name');
        $ExpenseCategory->parent_id = $request->input('parent_id');*/
        $expensecategory->update($request->all());
        return redirect()->route('expensecategory.index')->with('success','ExpenseCategory information updated successfully');

    }


    public function destroy(ExpenseCategory $expensecategory)
    {
        $expensecategory->delete();
        return redirect()->route('expensecategory.index')
            ->with('success','Expense Category information deleted successfully');

    }
}
