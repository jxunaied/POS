<?php

namespace App\Http\Controllers;

use App\Expense;
use App\ExpenseCategory;
use Carbon\Carbon;
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
        $expenses = Expense::latest()->paginate(12);
        return view('admin.expense.index', compact('expenses'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $categories = ExpenseCategory::all();
        return view('admin.Expense.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "category_id"=>"required",
            "amount"=>"required",
            "remarks"=>"required",
            
        ]);

        $date = Carbon::now();
        $expense = new Expense();
        $expense->name = $request->input('name');
        $expense->category_id = $request->input('category_id');
        $expense->amount = $request->input('amount');
        $expense->month = $date->format('F');
        $expense->year = $date->format('Y');
        $expense->date = $date->format('Y-m-d');
        $expense->remarks = $request->input('remarks');
        $expense->save();

        return redirect()->route('expense.index')
            ->with('success','Expense added successfully.');

    }

    public function show(Expense $expense)
    {
        return view('admin.expense.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
        return view('admin.expense.edit',compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
       $request->validate([
            "name"=>"required | min:3",
            "parentid"=>"required",
        ]);


        $expense = new Expense();
        $expense->name = $request->input('name');
        $expense->category_id = $request->input('category_id');
        $expense->amount = $request->input('amount');
        $expense->remarks = $request->input('remarks');
        $expense->save();
        return redirect()->route('expense.index')->with('success','Expense information updated successfully');

    }


    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expense.index')
            ->with('success','Expense information deleted successfully');

    }

    public function today_expense()
    {
        $today = date('Y-m-d');
        $expenses = Expense::latest()->where('date', $today)->get();
        return view('admin.expense.date', compact('expenses'));
    }

    public function month_expense($month = null)
    {
        if ($month == null)
        {
            $month = date('F');
        }
        $expenses = Expense::latest()->where('month', $month)->get();
        return view('admin.expense.month', compact('expenses', 'month'));
    }

    public function yearly_expense($year = null)
    {
        if ($year == null)
        {
            $year = date('Y');
        }
        $expenses = Expense::latest()->where('year', $year)->get();
        $years = Expense::select('year')->distinct()->take(12)->get();
        return view('admin.expense.year', compact('expenses', 'year', 'years'));
    }
}
