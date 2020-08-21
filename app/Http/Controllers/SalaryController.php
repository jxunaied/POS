<?php

namespace App\Http\Controllers;

use App\Salary;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         
        $salarys = Salary::latest()->paginate(12);
        return view('admin.salary.index', compact('salarys'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $employees = Employee::all();
        return view('admin.salary.create', compact('employees'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "employee_id"=>"required",
            "salary_month"=>"required",
            "salary_year"=>"required",
            "paid_amount"=>"required",
            
        ]);
        $salary = new Salary();
        $salary->employee_id = $request->input('employee_id');
        $salary->salary_month = $request->input('salary_month');
        $salary->salary_year = $request->input('salary_year');
        $salary->paid_amount = $request->input('paid_amount');
        $salary->save();

        return redirect()->route('salary.index')
            ->with('success','Salary given successfully.');

    }

    public function show(Salary $salary)
    {
        return view('admin.salary.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('admin.salary.edit',compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
       $request->validate([
            "employee_id"=>"required",
            "salary_month"=>"required",
            "salary_year"=>"required",
            "paid_amount"=>"required",
        ]);


        
        $salary->update($request->all());
        return redirect()->route('salary.index')->with('success','Salary information updated successfully');

    }


    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salary.index')
            ->with('success','Salary information deleted successfully');

    }
}
