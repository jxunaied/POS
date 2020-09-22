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
            
        ]);

        /*$date = Carbon::now();*/
        $date =  Carbon::createFromFormat('Y-m-d', $request->input('date'));
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
        $categories = ExpenseCategory::all();
        return view('admin.expense.edit',compact('expense', 'categories'));
    }

    public function update(Request $request, Expense $expense)
    {
       $request->validate([
            "name"          =>  "required",
            "category_id"   =>  "required",
            "amount"        =>  "required",
        ]);

        $date =  Carbon::createFromFormat('Y-m-d', $request->input('date'));

        $expense->name = $request->input('name');
        $expense->category_id = $request->input('category_id');
        $expense->month = $date->format('F');
        $expense->year = $date->format('Y');
        $expense->date = $date->format('Y-m-d');
        $expense->amount = $request->input('amount');
        $expense->remarks = $request->input('remarks');
        $expense->update();
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

    public function expense_filter(Request $request)
    {
        $month = $request['month'];
        $year = $request['year'];
        $date = $request['date'];

        if ($month == null && $year == null && $date == null)
        {
            $date = date('Y-m-d');
            $expenses = Expense::latest()->whereDate('date',$date )->get();
            return view('admin.expense.month', compact('expenses'));
        } else if ($date != null){
            $expenses = Expense::latest()->whereDate('date', $date)->get();
            return view('admin.expense.month', compact('expenses'));
        } else if ($month != null && $date == null){
            if( $year == null){
                $year = date('Y');
            }
            $expenses = Expense::latest()->whereMonth('date', $month)->whereYear('date', $year)->get();
            return view('admin.expense.month', compact('expenses'));
        } else if ( $month == null && $year != null && $date == null) {
            $expenses = Expense::latest()->whereYear('date', $year)->get();
            return view('admin.expense.month', compact('expenses'));
        }

        return '';
    }
    public function expense_year()
    {
        $year = date('Y');
        $expenses = Expense::latest()->where('year', $year)->get();
        return view('admin.expense.month', compact('expenses'));
    }

    public function expenseMonth()
    {
        $month = date('m');
        $year = date('Y');
        $expenses = Expense::latest()->whereMonth('date', $month)->where('year', $year)->get();
        return view('admin.expense.month', compact('expenses'));
    }


}
