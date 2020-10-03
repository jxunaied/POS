<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $sales = Sale::sum('total');
        $salesToday = Sale::where('sales_date', date('d/m/y'))->sum('total');
        $orders = Sale::count('id');
        $ordersToday = Sale::where('sales_date', date('d/m/y'))->count();
        $expense = Expense::sum('amount');
        $expenseToday = Expense::where('date', date('d-m-y'))->sum('amount');
        return view('home', compact('sales','salesToday','orders','ordersToday','expense','expenseToday'));
    }
}
