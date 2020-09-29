<?php

namespace App\Http\Controllers;

use App\LandOwner;
use App\PaymentLandOwner;
use Illuminate\Http\Request;

class PaymentLandOwnerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $payments = PaymentLandOwner::latest()->paginate(12);
        return view('admin.landpay.index', compact('payments'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $owners = LandOwner::all();
        return view('admin.landpay.create', compact('owners'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "land_owners_id"                  =>  "required",
            "payment_date"           =>  "required",
            "year"           =>  "required",
            "amount"                 =>  "required",
        ]);

        $payment = new PaymentLandOwner();
        $payment->land_owners_id = $request->input('land_owners_id');
        $payment->payment_date = $request->input('payment_date');
        $payment->year = $request->input('year');
        $payment->amount = $request->input('amount');
        $payment->remarks = $request->input('remarks');
        $payment->save();

        return redirect()->route('mati-payment.index')
            ->with('success','Information added successfully.');

    }

    public function show(PaymentLandOwner $payment)
    {
        return view('admin.landpay.show', compact('payment'));
    }

    public function edit($id)
    {
        $owners = LandOwner::all();
        $payment = PaymentLandOwner::latest()->where('id', $id)->first();

        return view('admin.landpay.edit',compact('payment', 'owners'));
    }

    public function update(Request $request, PaymentLandOwner $payment)
    {
        $request->validate([
            "land_owners_id"                  =>  "required",
            "payment_date"           =>  "required",
            "year"           =>  "required",
            "amount"                 =>  "required",
        ]);
        $payment->land_owners_id = $request->input('land_owners_id');
        $payment->payment_date = $request->input('payment_date');
        $payment->year = $request->input('year');
        $payment->amount = $request->input('amount');
        $payment->remarks = $request->input('remarks');
        $payment->update();
        return redirect()->route('land-pay.index')->with('success','Information updated successfully');

    }

    public function destroy($id)
    {
        $payment = PaymentLandOwner::latest()->where('id', $id)->first();
        $payment->delete();
        return redirect()->route('land-pay.index')
            ->with('success','Information deleted successfully');

    }
}
