<?php

namespace App\Http\Controllers;

use App\CashDeposit;
use Illuminate\Http\Request;

class CashDepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $deposits = CashDeposit::latest()->paginate(12);
        return view('admin.cashdeposit.index', compact('deposits'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.cashdeposit.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "deposit_date"  =>  "required",
            "from"          =>  "required",
            "to"            =>  "required",
            "amount"        =>  "required",
        ]);
        $deposit = new CashDeposit();
        $deposit->deposit_date = $request->input('deposit_date');
        $deposit->from = $request->input('from');
        $deposit->to = $request->input('to');
        $deposit->amount = $request->input('amount');
        $deposit->remarks = $request->input('remarks');
        $deposit->save();

        return redirect()->route('cashdeposit.index')
            ->with('success','Deposit Information Added.');

    }

    public function show(CashDeposit $deposit)
    {
        return view('admin.cashdeposit.show', compact('deposit'));
    }

    public function edit($id)
    {
        $deposit = CashDeposit::find($id);
        return view('admin.cashdeposit.edit',compact('deposit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "deposit_date"  =>  "required",
            "from"          =>  "required",
            "to"            =>  "required",
            "amount"        =>  "required",
        ]);

        $deposit = CashDeposit::find($id);
        $deposit->deposit_date = $request->input('deposit_date');
        $deposit->from = $request->input('from');
        $deposit->to = $request->input('to');
        $deposit->amount = $request->input('amount');
        $deposit->remarks = $request->input('remarks');
        $deposit->update();
        return redirect()->route('cashdeposit.index')->with('success','Deposit information updated successfully');

    }


    public function destroy($id)
    {
        $deposit = CashDeposit::find($id);
        $deposit->delete();
        return redirect()->route('cashdeposit.index')
            ->with('success','Deleted Successful');

    }

    public function deposit_filter(Request $request)
    {
        $month = $request['month'];
        $year = $request['year'];
        $date = $request['date'];

        if ($month == null && $year == null && $date == null)
        {
            $date = date('Y-m-d');
            $deposits = CashDeposit::latest()->whereDate('deposit_date',$date )->get();
            return view('admin.Cashdeposit.month', compact('deposits'));
        } else if ($date != null){
            $deposits = CashDeposit::latest()->whereDate('deposit_date', $date)->get();
            return view('admin.Cashdeposit.month', compact('deposits'));
        } else if ($month != null && $date == null){
            if( $year == null)
                $year = date('Y');
            $deposits = CashDeposit::latest()->whereMonth('deposit_date', $month)->whereYear('deposit_date', $year)->get();
            return view('admin.Cashdeposit.month', compact('deposits'));
        } else if ( $month == null && $year != null && $date == null) {
            $deposits = CashDeposit::latest()->whereYear('deposit_date', $year)->get();
            return view('admin.Cashdeposit.month', compact('deposits'));
        }

        return '';
    }
    public function depositYear()
    {
        $year = date('Y');
        $deposits = CashDeposit::latest()->whereYear('deposit_date', $year)->get();
        return view('admin.cashdeposit.month', compact('deposits'));
    }

    public function depositMonth()
    {
        $month = date('m');
        $year = date('Y');
        $deposits = CashDeposit::latest()->whereMonth('deposit_date', $month)->whereYear('deposit_date', $year)->get();
        return view('admin.cashdeposit.month', compact('deposits'));
    }
}
