<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = DB::table('products')
                    ->join('product_categories', 'products.category_id', 'product_categories.id')
                    ->select('product_categories.name', 'products.*')
                    ->get();
        $customers = DB::table('customers')->get();
        return view('admin.pos.pos', compact('products', 'customers'));
    }
}
