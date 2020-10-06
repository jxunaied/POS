<?php

namespace App\Http\Controllers;

use App\saleAtaGlance;
use Illuminate\Http\Request;

class SaleAtaGlanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = saleAtaGlance::latest()->paginate(15);
        return view('admin.sale2.index', compact('sales'))->with('i', (request()->input('page', 1) - 1) * 15);

    }

    public function create()
    {
        $date = date('d-M-Y');
        return view('admin.sale2.create',compact('date'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "qty_bricks"=>"required",
            "cash_sale"=>"required",
            "dues"=>"required",
            "acc_receivable"=>"required",
            "advance"=>"required",
            "expense"=>"required",
            "deposits"=>"required",
        ]);

        $today = date('Y-m-d');
        $today_sales = saleAtaGlance::latest()->where('date', $today)->first();

        if(!$today_sales){
            $last_balance = saleAtaGlance::all()->last();
            $sale = new saleAtaGlance();
            $sale->date = date('Y-m-d');
            $sale->qty_bricks = $request->input('qty_bricks');
            if($last_balance == null){
                $sale->opening_balance = 0;
            } else {
                $sale->opening_balance = $last_balance->closing_balance;
            }

            $sale->cash_sale = $request->input('cash_sale');
            $sale->dues = $request->input('dues');
            $sale->acc_receivable = $request->input('acc_receivable');
            $sale->advance = $request->input('advance');
            $sale->gross_sales = ($sale->opening_balance + $sale->cash_sale + $sale->acc_receivable + $sale->advance);
            $sale->expense = $request->input('expense');
            $sale->net_sales = ($sale->gross_sales - $sale->expense);
            $sale->deposits = $request->input('deposits');
            $sale->closing_balance = ($sale->net_sales - $sale->deposits);
            $sale->save();

            return redirect()->route('sale2.index')
                ->with('success','Info added successfully.');
        }else {
            return redirect()->route('sale2.index')
                ->with('warning','Already added todays info. please update it');
        }


    }

    public function show(saleAtaGlance $sale)
    {
        return view('admin.sale2.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = saleAtaGlance::where('id', $id)->first();
        return view('admin.sale2.edit',compact('sale'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "qty_bricks"=>"required",
            "cash_sale"=>"required",
            "dues"=>"required",
            "acc_receivable"=>"required",
            "advance"=>"required",
            "expense"=>"required",
            "deposits"=>"required",
        ]);

        $last_balance = saleAtaGlance::where('id', $id - 1)->first();

        $sale = saleAtaGlance::where('id', $id)->first();

        $sale->date = date('Y-m-d');
        $sale->qty_bricks = $request->input('qty_bricks');
        if($last_balance == null){
            $sale->opening_balance = 0;
        } else {
            $sale->opening_balance = $last_balance->closing_balance;
        }
        $sale->cash_sale = $request->input('cash_sale');
        $sale->dues = $request->input('dues');
        $sale->acc_receivable = $request->input('acc_receivable');
        $sale->advance = $request->input('advance');
        $sale->gross_sales = ($sale->opening_balance + $sale->cash_sale + $sale->acc_receivable + $sale->advance);
        $sale->expense = $request->input('expense');
        $sale->net_sales = ($sale->gross_sales - $sale->expense);
        $sale->deposits = $request->input('deposits');
        $sale->closing_balance = ($sale->net_sales - $sale->deposits);
        $sale->update();

        return redirect()->route('sale2.index')
            ->with('success','Info added successfully.');
    }

    public function destroy($id)
    {
        $sale = saleAtaGlance::where('id', $id)->first();
        $sale->delete();
        return redirect()->route('sale2.index')
            ->with('success','Information deleted successfully');
    }

    public function today_sale()
    {
        $today = date('Y-m-d');
        $sales = saleAtaGlance::latest()->where('date', $today)->paginate(15);

        return view('admin.sale2.month', compact('sales'))->with('i', (request()->input('page', 1) - 1) * 15);

    }

    public function sale_filter(Request $request)
    {
        $month = $request['month'];
        $year = $request['year'];
        $date = $request['date'];

        if ($month == null && $year == null && $date == null)
        {
            $date = date('Y-m-d');
            $sales = saleAtaGlance::latest()->whereDate('date',$date )->paginate(15);
            return view('admin.sale2.month', compact('sales'))->with('i', (request()->input('page', 1) - 1) * 15);
        } else if ($date != null){
            $sales = saleAtaGlance::latest()->whereDate('date', $date)->paginate(15);
            return view('admin.sale2.month', compact('sales'))->with('i', (request()->input('page', 1) - 1) * 15);
        } else if ($month != null && $date == null){
            if( $year == null){
                $year = date('Y');
            }
            $sales = saleAtaGlance::latest()->whereMonth('date', $month)->whereYear('date', $year)->paginate(15);
            return view('admin.sale2.month', compact('sales'))->with('i', (request()->input('page', 1) - 1) * 15);
        } else if ( $month == null && $year != null && $date == null) {
            $sales = saleAtaGlance::latest()->whereYear('date', $year)->paginate(15);
            return view('admin.sale2.month', compact('sales'))->with('i', (request()->input('page', 1) - 1) * 15);
        }

        return '';
    }
    public function sale_year()
    {
        $year = date('Y');
        $sales = saleAtaGlance::latest()->whereYear('date', $year)->paginate(15);
        return view('admin.sale2.month', compact('sales'))->with('i', (request()->input('page', 1) - 1) * 15);
    }

    public function saleMonth()
    {
        $month = date('m');
        $year = date('Y');
        $sales = saleAtaGlance::latest()->whereMonth('date', $month)->whereYear('date', $year)->paginate(15);
        return view('admin.sale2.month', compact('sales'))->with('i', (request()->input('page', 1) - 1) * 15);
    }
}
