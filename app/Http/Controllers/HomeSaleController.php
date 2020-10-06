<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Sale;
use App\saleAtaGlance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeSaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = Carbon::today()->subDays(7);

        $sales = saleAtaGlance::sum('cash_sale');
        $salesToday = saleAtaGlance::where('date', date('d/m/y'))->sum('cash_sale');
        $salesSeven = saleAtaGlance::where('date', '>=', $date)->sum('cash_sale');

        $bricks = saleAtaGlance::sum('qty_bricks');
        $bricksToday = saleAtaGlance::where('date', date('d/m/y'))->sum('qty_bricks');
        $bricksSeven = saleAtaGlance::where('date', '>=', $date)->sum('qty_bricks');

        $expense = saleAtaGlance::sum('expense');
        $expenseToday = saleAtaGlance::where('date', date('d-m-y'))->sum('expense');
        $expenseSeven = saleAtaGlance::where('date', '>=', $date)->sum('expense');

        $due = saleAtaGlance::sum('dues');
        $dueToday = saleAtaGlance::where('date', date('d/m/y'))->sum('dues');
        $dueMonth = saleAtaGlance::whereMonth('date', '>=', date('m'))->sum('dues');

        $deposits = saleAtaGlance::sum('deposits');
        $depositsToday = saleAtaGlance::where('date', date('d/m/y'))->sum('deposits');
        $depositsMonth = saleAtaGlance::whereMonth('date', '>=', date('m'))->sum('deposits');
        $depositsSeven = saleAtaGlance::where('date', '>=', $date)->sum('deposits');

        return view('home2', compact('sales','salesToday','salesSeven','bricks',
            'bricksToday','bricksSeven','expenseToday','expense', 'expenseSeven','due','dueToday',
            'dueMonth', 'deposits', 'depositsToday', 'depositsMonth', 'depositsSeven'));
    }
}
