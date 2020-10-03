<?php

namespace App\Http\Controllers;

use App\DieselInventory;
use Illuminate\Http\Request;

class DiselInventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $invs= DieselInventory::latest()->paginate(12);
        return view('admin.dieselinventory.index', compact('invs'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('admin.dieselinventory.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "added_date"            =>  "required",
            "diesel_amount"           =>  "required",
        ]);

        $inv = new DieselInventory();
        $inv->added_date = $request->input('added_date');
        $inv->diesel_amount = $request->input('diesel_amount');
        $inv->remarks = $request->input('remarks');
        $inv->save();

        return redirect()->route('diesel-inventory.index')
            ->with('success','Information added successfully.');

    }

    public function show(DieselInventory $inv)
    {
        return view('admin.dieselinventory.show', compact('inv'));
    }

    public function edit($id)
    {
        $inv = DieselInventory::latest()->where('id', $id)->get();
        return view('admin.dieselinventory.edit',compact('inv'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "added_date"            =>  "required",
            "diesel_amount"           =>  "required",
        ]);

        $inv = DieselInventory::latest()->where('id', $id)->first();
        $inv->added_date = $request->input('added_date');
        $inv->diesel_amount = $request->input('diesel_amount');
        $inv->remarks = $request->input('remarks');
        $inv->update();
        return redirect()->route('diesel-inventory.index')->with('success','Information updated successfully');

    }

    public function destroy($id)
    {
        $inv = DieselInventory::latest()->where('id', $id)->first();
        $inv->delete();
        return redirect()->route('diesel-inventory.index')
            ->with('success','Information deleted successfully');

    }
}
