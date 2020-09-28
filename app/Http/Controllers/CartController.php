<?php

namespace App\Http\Controllers;

use App\Sale;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addcart(Request $request)
    {
        $products = array();
        $products['id'] = $request->id;
        $products['name'] = $request->name;
        $products['qty'] = $request->qty;
        $products['price'] = $request->price;

        $add = Cart::add($products);

        return Redirect()->back();
    }

    public function updatecart(Request $request, $rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);

        return Redirect()->back();
    }

    public function removecart($rowId)
    {
        $update = Cart::remove($rowId);

        return Redirect()->back();
    }

    public function createInvoice(Request $request)
    {
        $request->validate([
            "customer_id"=>"required",
            ],
            [
                'customer_id.required' => 'Select Customer'
        ]);
        $cus_id = $request->customer_id;

        $customer = DB::table('customers')->where('id', $cus_id)->first();
        $cartItems = Cart::content();
        return view('admin.pos.invoice', compact('cartItems', 'customer'));
    }

    public function createPayment(Request $request)
    {

/*        print_r($request->all());
        exit();*/

        $sale = array();
        $sale['cus_id'] = $request->cus_id;
        $sale['sales_date'] = $request->sales_date;
        $sale['discount_amount'] = floatval($request->discount_amount);
        $sale['total']= floatval(preg_replace('/[^\d.]/', '', Cart::total()));
        $sale['sub_total'] = floatval(preg_replace('/[^\d.]/', '', Cart::subtotal()));
        $sale['paid'] = floatval($request->paid);
        $sale['due'] = floatval($request->due);
        $sale['remarks'] = $request->remarks;
        $sale['vat'] = floatval(preg_replace('/[^\d.]/', '', Cart::tax()));
        $sale['created_at'] =new \DateTime();
        $sale['updated_at'] =new \DateTime();
        $sale['payment_status'] = $request->payment_type;

        $chk = DB::table('sales')->insertGetId($sale);

        $contents = Cart::content();
        $order = array();
        foreach ($contents as $content){
            $order['sales_id'] = $chk;
            $order['product_id'] = $content->id;
            $order['quantity'] = $content->qty;
            $order['price'] = $content->price;
            $order['total'] = $content->total;
            $order['created_at'] =new \DateTime();
            $order['updated_at'] =new \DateTime();
            DB::table('orders_details')->insert($order);
        }

        return redirect('/sales');

    }


}
