<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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

    public function orders()
    {
        $orders = DB::table('sales')
            ->join('customers', 'sales.cus_id', 'customers.id')
            ->select('customers.name', 'sales.*')
            ->paginate(15);
        return view('admin.pos.sales', compact('orders'));
    }

    public function deleteOrders($id)
    {
        $orders = DB::table('sales')
            ->where('id', $id)->delete();;
        return Redirect()->back();
    }

    public function detailsOrders($id)
    {
        $orders = DB::table('sales')
            ->where('sales.id', $id)
            ->first();

        $customer = DB::table('customers')
            ->where('customers.id', $orders->cus_id)
            ->first();

        $orderDetails = DB::table('orders_details')
            ->join('products', 'orders_details.product_id', 'products.id')
            ->select('orders_details.*', 'products.name')
            ->where('sales_id', $id)
            ->get();
        return view('admin.pos.salesdetails', compact('orders', 'orderDetails', 'customer'));
    }
}
