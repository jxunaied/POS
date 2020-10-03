<?php

namespace App\Http\Controllers;

use App\Customer;
use App\CustomerDue;
use Illuminate\Http\Request;

class CustomerDueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $payment = CustomerDue::latest()->paginate(12);
        return view('admin.Customerpayment.index', compact('payment'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $customer = Customer::all();
        return view('admin.Customerpayment.create', compact('customer'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "invoice_no"=>"required",
            "original_amount"=>"required",
            "cus_id"=>"required",
            "paid_date"=>"required",
            "paid_amount"=>"required",
            "current_due"=>"required",
        ]);
        $customer = new CustomerDue();
        $customer->invoice_no = $request->input('invoice_no');
        $customer->original_amount = $request->input('original_amount');
        $customer->cus_id = $request->input('cus_id');
        $customer->paid_date = $request->input('paid_date');
        $customer->paid_amount = $request->input('paid_amount');
        $customer->current_due = $request->input('current_due');
        $customer->remarks = $request->input('remarks');
        $customer->save();

        return redirect()->route('customer-payment.index')
            ->with('success','Payment added successfully.');

    }

    public function show(CustomerDue $customer)
    {
        return view('admin.Customerpayment.show', compact('customer'));
    }

    public function edit(CustomerDue $customer)
    {
        return view('admin.Customerpayment.edit',compact('customer'));
    }

    public function update(Request $request, CustomerDue $customer)
    {
        $request->validate([
            "invoice_no"=>"required",
            "original_amount"=>"required",
            "cus_id"=>"required",
            "paid_date"=>"required",
            "paid_amount"=>"required",
            "current_due"=>"required",
        ]);

        $customer->invoice_no = $request->input('invoice_no');
        $customer->original_amount = $request->input('original_amount');
        $customer->cus_id = $request->input('cus_id');
        $customer->paid_date = $request->input('paid_date');
        $customer->paid_amount = $request->input('paid_amount');
        $customer->current_due = $request->input('current_due');
        $customer->remarks = $request->input('remarks');
        $customer->update();

        return redirect()->route('customer-payment.index')->with('success','Payment information updated successfully');

    }


    public function destroy(CustomerDue $customer)
    {
        $customer->delete();
        return redirect()->route('customer-payment.index')
            ->with('success','Payment information deleted successfully');

    }
}
