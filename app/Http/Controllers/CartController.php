<?php

namespace App\Http\Controllers;

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
        return view('admin.pos.invoice', compact('customer', 'cartItems'));
    }
}
