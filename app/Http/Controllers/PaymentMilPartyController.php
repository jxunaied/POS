<?php

namespace App\Http\Controllers;

use App\MilParty;
use App\PaymentMilParty;
use Illuminate\Http\Request;

class PaymentMilPartyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $payments = PaymentMilParty::latest()->paginate(12);
        return view('admin.milpay.index', compact('payments'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $owners = MilParty::all();
        return view('admin.milpay.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "mil_party_id"         =>  "required",
            "payment_date"           =>  "required",
            "amount"                   =>  "required",
        ]);

        $payment = new PaymentMilParty();
        $payment->mil_party_id = $request->input('mil_party_id');
        $payment->payment_date = $request->input('payment_date');
        $payment->amount = $request->input('amount');
        $payment->remarks = $request->input('remarks');
        $payment->save();

        return redirect()->route('milparty-payment.index')
            ->with('success','Information added successfully.');
    }


    public function edit($id)
    {
        $owners = MilParty::all();
        $payment = PaymentMilParty::latest()->where('id', $id)->first();

        return view('admin.milpay.edit',compact('payment', 'owners'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "mil_party_id"         =>  "required",
            "payment_date"           =>  "required",
            "amount"                   =>  "required",
        ]);

        $payment = PaymentMilParty::latest()->where('id', $id)->first();
        $payment->mil_party_id = $request->input('mil_party_id');
        $payment->payment_date = $request->input('payment_date');
        $payment->amount = $request->input('amount');
        $payment->remarks = $request->input('remarks');
        $payment->update();
        return redirect()->route('milparty-payment.index')->with('success','Information updated successfully');

    }

    public function destroy($id)
    {
        $payment = PaymentMilParty::latest()->where('id', $id)->first();
        $payment->delete();
        return redirect()->route('milparty-payment.index')
            ->with('success','Information deleted successfully');
    }
}
