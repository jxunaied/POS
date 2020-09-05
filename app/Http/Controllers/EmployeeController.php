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
            "name"=>"required | min:3",
            //"email"=>"required | email | unique:employees",
            "phone"=>"required",
            "address"=>"required",
            "experience"=>"required",
            /*"photo"=>"required |image",*/
            "salary"=>"required",
            "city"=>"required",
            "nid" => "required"
            /*"joining"=>"required",*/
            //"leave"=>"required"
        ]);
       /* $image = $request->file('photo');
        $slug =  Str::slug($request->input('name'));
        if ($request->hasFile('photo'))
        {
            $imageName = $slug.'-'.uniqid().$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('employee'))
            {
                Storage::disk('public')->makeDirectory('employee');
            }
            $postImage = Image::make($image)->resize(1600, 1066)->stream();
            Storage::disk('public')->put('employee/'.$imageName, $postImage,'public');
        } else
        {
            $imageName = 'default.png';
        }*/

        /*
        $employee->name = $request->input('name');
        if($request->input('email') == null){
            $employee->email = 'not_available@pos.com';
        } else {
            $employee->email = $request->input('email');
        }
        $employee->phone = $request->input('phone');
        $employee->address = $request->input('address');
        $employee->city = $request->input('city');
        $employee->experience = $request->input('experience');
        $employee->salary = $request->input('salary');
        $employee->vacation = $request->input('vacation');
        $employee->joining = $request->input('joining');
        $employee->leave = $request->input('leave');
        $employee->photo = $imageName;
        $employee->save();*/
        $employee = new Employee();
        $employee->save($request->all());

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
            "name"=>"required | min:3",
            /*"email"=>"required | email ",*/
            "phone"=>"required",
            "address"=>"required",
            "experience"=>"required",
           // "photo"=>"required |image",
            "salary"=>"required",
            "nid"=>"required",
            /*"vacation"=>"required",*/
            "city"=>"required",
/*          "joining"=>"required",
            "leave"=>"required"*/
        ]);
        /*$image = $request->file('photo');
        $slug =  Str::slug($request->input('name'));
        if ($request->hasFile('photo'))
        {
            $imageName = $slug.'-'.uniqid().$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('employee'))
            {
                Storage::disk('public')->makeDirectory('employee');
            }
            $postImage = Image::make($image)->resize(1600, 1066)->stream();
            Storage::disk('public')->put('employee/'.$imageName, $postImage,'public');

            if (!Storage::disk('public/employee')->exists( $employee->photo))
            {
                Storage::delete('/public/employee' . $employee->photo);
            }
        }*/

/*        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->address = $request->input('address');
        $employee->city = $request->input('city');
        $employee->experience = $request->input('experience');
        $employee->salary = $request->input('salary');
        $employee->vacation = $request->input('vacation');
        $employee->joining = $request->input('joining');
        $employee->leave = $request->input('leave');
        $employee->photo = $request->input('photo');*/
        //echo $employee;
        //$employee->photo = $imageName;
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
