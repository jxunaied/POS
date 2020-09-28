<?php

namespace App\Http\Controllers;

use App\PaymentSoilSorder;
use App\SoilSordar;
use Illuminate\Http\Request;

class PaymentSoilSorderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $payments = PaymentSoilSorder::latest()->paginate(12);
        return view('admin.soilpay.index', compact('payments'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $sordars = SoilSordar::all();
        return view('admin.soilpay.create', compact('sordars'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "soil_sorder_id"                  =>  "required",
            "payment_date"           =>  "required",
            "pay_amount"                 =>  "required",
        ]);

        $payment = new PaymentSoilSorder();
        $payment->soil_sorder_id = $request->input('soil_sorder_id');
        $payment->payment_date = $request->input('payment_date');
        $payment->pay_amount = $request->input('pay_amount');
        $payment->remarks = $request->input('remarks');
        $payment->save();

        return redirect()->route('mati-payment.index')
            ->with('success','Information added successfully.');

    }

    public function show(PaymentSoilSorder $payment)
    {
        return view('admin.soilpay.show', compact('payment'));
    }

    public function edit($id)
    {
        $sordars = SoilSordar::all();
        $payment = PaymentSoilSorder::latest()->where('id', $id)->first();
       /* echo '<pre>';
        echo $payment->id;
        print_r($payment[0]);
        exit();*/
        return view('admin.soilpay.edit',compact('payment', 'sordars'));
    }

    public function update(Request $request, PaymentSoilSorder $payment)
    {
        $request->validate([
            "soil_sorder_id"                  =>  "required",
            "payment_date"           =>  "required",
            "pay_amount"                 =>  "required",
        ]);

        $payment->soil_sorder_id = $request->input('soil_sorder_id');
        $payment->payment_date = $request->input('payment_date');
        $payment->pay_amount = $request->input('pay_amount');
        $payment->remarks = $request->input('remarks');
        $payment->save();
        return redirect()->route('mati-payment.index')->with('success','Information updated successfully');

    }

    public function destroy($id)
    {
        $payment = PaymentSoilSorder::latest()->where('id', $id)->first();
        $payment->delete();
        return redirect()->route('mati-payment.index')
            ->with('success','Information deleted successfully');

    }
}
