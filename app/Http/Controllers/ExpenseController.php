<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Expenses = Expense::latest()->paginate(12);
        return view('admin.expense.index', compact('Expenses'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.Expense.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "category_id"=>"required",
            "amount"=>"required",
            "remarks"=>"required",
            
        ]);
        $Expense = new Expense();
        $Expense->name = $request->input('name');
        $Expense->category_id = $request->input('category_id');        
        $Expense->amount = $request->input('amount');
        $Expense->remarks = $request->input('remarks');
        $Expense->save();

        return redirect()->route('expense.index')
            ->with('success','Expense added successfully.');

    }

    public function show(Expense $expense)
    {
        return view('admin.Expense.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        return view('admin.Expense.edit',compact('expense'));
    }

    public function update(Request $request, Expense $Expense)
    {
       $request->validate([
            "name"=>"required | min:3",
            "parentid"=>"required",
        ]);


        $Expense = new Expense();
        $Expense->name = $request->input('name');
        $Expense->category_id = $request->input('category_id');
        $Expense->amount = $request->input('amount');
        $Expense->remarks = $request->input('remarks');
        $Expense->save();
        return redirect()->route('Expense.index')->with('success','Expense information updated successfully');

    }


    public function destroy(Expense $Expense)
    {
        $Expense->delete();
        return redirect()->route('Expense.index')
            ->with('success','Expense information deleted successfully');

    }
}
