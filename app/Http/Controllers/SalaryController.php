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
        $check_salary = Salary::where('employee_id', $request->employee_id)->where('salary_month', $request->salary_month)->where('salary_year', $request->salary_year)->first();

        if (!$check_salary)
        {
            $salary = new Salary();
            $salary->employee_id = $request->input('employee_id');
            $salary->salary_month = $request->input('salary_month');
            $salary->salary_year = $request->input('salary_year');
            $salary->paid_amount = $request->input('paid_amount');
            $salary->save();

            return redirect()->route('salary.index')
                ->with('success','Salary given successfully.');
        } else {
            return redirect()->route('salary.create')->with('error','Salary already paid for the employee');
        }

    }

    public function show(Salary $salary)
    {
        return view('admin.salary.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        return view('admin.salary.edit',compact('salary'));
    }

    public function update(Request $request, Salary $salary)
    {
        $request->validate([
            "employee_id"=>"required",
            "salary_month"=>"required",
            "salary_year"=>"required",
            "paid_amount"=>"required",

        ]);

        /*print_r( $request->all());*/
        $salary->employee_id = $request['employee_id'];
        $salary->salary_month = $request['salary_month'];
        $salary->salary_year = $request['salary_year'];
        $salary->paid_amount = $request['paid_amount'];
        $salary->update();

        return redirect()->route('salary.index')
            ->with('success','Salary Updated successfully.');

    }


    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salary.index')
            ->with('success','Salary information deleted successfully');

    }

    public function salary_filter(Request $request)
    {
        $month = $request['month'];
        $year = $request['year'];
        if ($month != null && $year != null)
        {
            $salaries = Salary::latest()->where('salary_month', $month)->where('salary_year', $year)->get();
            return view('admin.salary.month', compact('salaries', 'month'));
        } else if ($month == null && $year != null){
            $salaries = Salary::latest()->where('salary_year', $year)->get();
            return view('admin.Salary.month', compact('salaries', 'month'));
        } else if ($month != null && $year == null){
            $salaries = Salary::latest()->where('salary_month', $month)->get();
            return view('admin.salary.month', compact('salaries', 'month'));
        }

        return '';
    }
    public function salaryYear()
    {
        $year = date('Y');
        $salaries = Salary::latest()->where('salary_year', $year)->get();
        return view('admin.salary.month', compact('salaries'));
    }

    public function salary_month()
    {
        $month = date('F');
        $year= date('Y');
        $salaries = Salary::latest()->where('salary_month', $month)->where('salary_year', $year)->get();
        return view('admin.salary.month', compact('salaries', 'month'));
    }
}
