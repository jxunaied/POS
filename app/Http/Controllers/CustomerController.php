<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::latest()->paginate(12);
        return view('admin.customer.index', compact('customers'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.customer.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required | min:3",
            "phone"=>"required",
            "address"=>"required",
            
        ]);
            $image = $request->file('photo');
            $slug =  Str::slug($request->input('name'));
            if ($request->hasFile('photo'))
            {
                $imageName = $slug.'-'.uniqid().$image->getClientOriginalExtension();
                if (!Storage::disk('public')->exists('customer'))
                {
                    Storage::disk('public')->makeDirectory('customer');
                }
                $postImage = Image::make($image)->resize(1600, 1066)->stream();
                Storage::disk('public')->put('customer/'.$imageName, $postImage,'public');
            } else
            {
                $imageName = 'default.png';
            }
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->city = $request->input('city');
        $customer->shop_name = $request->input('shop_name');
        $customer->nid_no = $request->input('nid_no');
        $customer->account_holder = $request->input('account_holder');
        $customer->account_number = $request->input('account_number');
        $customer->bank_name = $request->input('bank_name');
        $customer->bank_branch = $request->input('bank_branch');
        $customer->balance = $request->input('balance');
        $customer->due = $request->input('due');
        $customer->photo = $imageName;
        $customer->save();

        return redirect()->route('customer.index')
            ->with('success','customer added successfully.');

    }

    public function show(Customer $customer)
    {
        return view('admin.customer.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.edit',compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
       $request->validate([
            "name"=>"required | min:3",
            "phone"=>"required",
            "address"=>"required",
        ]);


        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->address = $request->input('address');
        $customer->city = $request->input('city');
        $customer->shop_name = $request->input('shop_name');
        $customer->photo = $request->input('photo');
        $customer->nid_no = $request->input('nid_no');
        $customer->account_holder = $request->input('account_holder');
        $customer->account_number = $request->input('account_number');
        $customer->bank_name = $request->input('bank_name');
        $customer->bank_branch = $request->input('bank_branch');
        $customer->balance = $request->input('balance');
        $customer->due = $request->input('due');
        $customer->photo = $imageName;
        $customer->save();
        return redirect()->route('customer.index')->with('success','customer information updated successfully');

    }


    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')
            ->with('success','customer information deleted successfully');

    }
}
