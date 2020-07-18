<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $employees=Employee::latest()->paginate(5);
        return view('admin.employee.index', compact('employees'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "id"=>"required",
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
            "address"=>"required",
            "experience"=>"required",
            "photo"=>"required",
            "salary"=>"required",
            "vacation"=>"required",
            "city"=>"required",
            "joining"=>"required",
            "leave"=>"required"
        ]);
        Employee::create($request->all());
        return redirect()->route('admin.employee.index')
            ->with('success','Employee enrolled successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([

            "id"=>"required",
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
            "address"=>"required",
            "experience"=>"required",
            "photo"=>"required",
            "salary"=>"required",
            "vacation"=>"required",
            "city"=>"required",
            "joining"=>"required",
            "leave"=>"required"

        ]);
        Employee::update($request->all());
        return redirect()->route('admin.employee.index')->with('success','Employee information updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('admin.employee.index')
            ->with('success','Employee information deleted successfully');

    }
}
