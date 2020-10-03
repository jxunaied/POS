<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::latest()->paginate(12);
        return view('admin.employee.index', compact('employees'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.employee.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  "required",
            "phone"     =>  "required",
            "address"   =>  "required",
            "experience"=>  "required",
            "salary"    =>  "required",
            "city"      =>  "required",
        ]);

        $employee = new Employee();
        $employee->name = $request['name'];
        $employee->email = $request['email'];
        $employee->phone = $request['phone'];
        $employee->address = $request['address'];
        $employee->city = $request['city'];
        $employee->experience = $request['experience'];
        $employee->salary = $request['salary'];
        $employee->nid = $request['nid'];
        $employee->joining_date = $request['joining_date'];
        $employee->leave_date = $request['leave_date'];
        $employee->save();

        return redirect()->route('employee.index')
            ->with('success','Employee added successfully.');

    }

    public function show(Employee $employee)
    {
        return view('admin.employee.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('admin.employee.edit',compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name'      =>  "required",
            "phone"     =>  "required",
            "address"   =>  "required",
            "experience"=>  "required",
            "salary"    =>  "required",
            "city"      =>  "required",
        ]);

        $employee->update($request->all());
        return redirect()->route('employee.index')->with('success','Employee information updated successfully');

    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index')
            ->with('success','Employee information deleted successfully');

    }
}
