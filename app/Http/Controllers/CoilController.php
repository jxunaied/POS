<?php

namespace App\Http\Controllers;

use App\Coil;
use App\Supplier;
use Illuminate\Http\Request;

class CoilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $coals = Coil::latest()->paginate(12);
        return view('admin.coal.index', compact('coals'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('admin.coal.create', compact('suppliers'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "truck_no"            =>  "required",
            "chalan_no"           =>  "required",
            "rate"                =>  "required",
            "quantity"            =>  "required",
            "truck_fair"          =>  "required",
            "supplier_id"         =>  "required",
            "place_name"          =>  "required",
            "purchase_date"       =>  "required",
        ]);

        $coal = new Coil();
        $coal->truck_no = $request->input('truck_no');
        $coal->chalan_no = $request->input('chalan_no');
        $coal->rate = $request->input('rate');
        $coal->quantity = $request->input('quantity');
        $coal->amount = $coal->rate * $coal->quantity;
        $coal->truck_fair = $request->input('truck_fair');
        $coal->total_amount = $coal->amount + $coal->truck_fair;
        $coal->supplier_id = $request->input('supplier_id');
        $coal->place_name = $request->input('place_name');
        $coal->purchase_date = $request->input('purchase_date');
        $coal->remarks = $request->input('remarks');
        $coal->save();

        return redirect()->route('coal.index')
            ->with('success','Information added successfully.');

    }

    public function show(Coil $coal)
    {
        return view('admin.coal.show', compact('coal'));
    }

    public function edit(Coil $coal)
    {
        $suppliers = Supplier::all();
        return view('admin.coal.edit',compact('coal', 'suppliers'));
    }

    public function update(Request $request, Coil $coal)
    {
        $request->validate([
            "truck_no"            =>  "required",
            "chalan_no"           =>  "required",
            "rate"                =>  "required",
            "quantity"            =>  "required",
            "truck_fair"          =>  "required",
            "supplier_id"         =>  "required",
            "place_name"          =>  "required",
            "purchase_date"       =>  "required",
        ]);

        $coal->truck_no = $request->input('truck_no');
        $coal->chalan_no = $request->input('chalan_no');
        $coal->rate = $request->input('rate');
        $coal->quantity = $request->input('quantity');
        $coal->amount = $coal->rate * $coal->quantity;
        $coal->truck_fair = $request->input('truck_fair');
        $coal->total_amount = $coal->amount + $coal->truck_fair;
        $coal->supplier_id = $request->input('supplier_id');
        $coal->place_name = $request->input('place_name');
        $coal->purchase_date = $request->input('purchase_date');
        $coal->remarks = $request->input('remarks');
        $coal->update();
        return redirect()->route('coal.index')->with('success','Information updated successfully');

    }

    public function destroy(Coil $coal)
    {
        $coal->delete();
        return redirect()->route('coal.index')
            ->with('success','Information deleted successfully');

    }
}
