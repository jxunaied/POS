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

        $request->validate([
            "name"=>"required | min:3",
            "phone"=>"required",
            "address"=>"required",
            "city"=>"required",
            "shop_name"=>"required",
        ]);

        $supplier = new supplier();
        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->account_holder = $request->input('account_holder');
        $supplier->account_number = $request->input('account_number');
        $supplier->bank_name = $request->input('bank_name');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->save();
        return redirect()->route('supplier.index')
            ->with('success','supplier added successfully.');


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
        $request->validate([
            "name"=>"required",
            "phone"=>"required",
            "address"=>"required",
            "city"=>"required",
            "shop_name"=>"required",
        ]);

        $supplier->name = $request->input('name');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->address = $request->input('address');
        $supplier->city = $request->input('city');
        $supplier->shop_name = $request->input('shop_name');
        $supplier->account_holder = $request->input('account_holder');
        $supplier->account_number = $request->input('account_number');
        $supplier->bank_name = $request->input('bank_name');
        $supplier->bank_branch = $request->input('bank_branch');
        $supplier->balance = $request->input('balance');
        $supplier->due = $request->input('due');
        $supplier->update();
        return redirect()->route('supplier.index')->with('success','supplier information updated successfully');
    }

   
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('supplier.index')
            ->with('success','supplier information deleted successfully');

    }
}
