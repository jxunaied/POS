<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $suppliers = supplier::latest()->paginate(12);
        return view('admin.supplier.index', compact('suppliers'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
         {
        $request->validate([
            "name"=>"required | min:3",
            "email"=>"required | email | unique:suppliers",
            "phone"=>"required",
            "address"=>"required",
            "city"=>"required",
            "type"=>"required ",
            "photo"=>"required",
            "shop_name"=>"required",
            "account_holder"=>"required",
            "account_number"=>"required",
            "bank_name"=>"required",
            "photo"=>"required",
            "shop_name"=>"required",
            "account_holder"=>"required",
            "account_number"=>"required",
            "bank_name"=>"required"
        ]);
        $image = $request->file('photo');
        $slug =  Str::slug($request->input('name'));
        if ($request->hasFile('photo'))
        {
            $imageName = $slug.'-'.uniqid().$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('supplier'))
            {
                Storage::disk('public')->makeDirectory('supplier');
            }
            $postImage = Image::make($image)->resize(1600, 1066)->stream();
            Storage::disk('public')->put('supplier/'.$imageName, $postImage,'public');
        } else
        {
            $imageName = 'default.png';
        }

        $supplier = new supplier();
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->type = $request->input('type');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->account_holder = $request->input('account_holder');
        $supplier->account_number = $request->input('account_number');
        $supplier->bank_name = $request->input('bank_name');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->photo = $request->input('photo');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->balance = $request->input('balance');
        $supplier->due = $request->input('due');
        $supplier->photo = $imageName;
        $supplier->save();
        return redirect()->route('supplier.index')
            ->with('success','supplier added successfully.');

    }
    }

    public function show(supplier $supplier)
    {
        return view('admin.supplier.show', compact('supplier'));
    }

    public function edit(supplier $supplier)
    {
        return view('admin.supplier.edit',compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        {
       $request->validate([
            "name"=>"required | min:3",
            "email"=>"required | email ",
            "phone"=>"required",
            "address"=>"required",
            "city"=>"required",
            "type"=>"required",
            "shop_name"=>"required",
            "account_holder"=>"required",
            "account_number"=>"required",
            "bank_name"=>"required",
            "bank_branch"=>"required",
            "balance"=>"required",
            "due"=>"required"
        ]);
        
        $supplier = new supplier();
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->type = $request->input('type');
        //$supplier->photo = $request->input('photo');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->account_holder = $request->input('account_holder');
        $supplier->account_number = $request->input('account_number');
        $supplier->bank_name = $request->input('bank_name');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->balance = $request->input('balance');
        $supplier->due = $request->input('due');
        $supplier->save();
        return redirect()->route('supplier.index')->with('success','supplier information updated successfully');

    }
    }

   
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')
            ->with('success','supplier information deleted successfully');

    }
}
