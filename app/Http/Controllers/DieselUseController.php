<?php

namespace App\Http\Controllers;

use App\DieselMil;
use App\DieselUse;
use Illuminate\Http\Request;

class DieselUseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $uses = DieselUse::latest()->paginate(12);
        return view('admin.dieseluses.index', compact('uses'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $mils = DieselMil::all();
        return view('admin.dieseluses.create', compact('mils'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "date"                  =>  "required",
            "amount"           =>  "required",
            "party_id"                 =>  "required",
        ]);

        $use = new DieselUse();
        $use->date = $request->input('date');
        $use->amount = $request->input('amount');
        $use->party_id = $request->input('party_id');
        $use->save();

        return redirect()->route('diesel-uses.index')
            ->with('success','Information added successfully.');

    }

    public function show(DieselUse $use)
    {
        return view('admin.dieseluses.show', compact('use'));
    }

    public function edit($id)
    {
        $mils = DieselMil::all();
        $use = DieselUse::latest()->where('id', $id)->first();
        return view('admin.dieseluses.edit',compact('mils', 'use'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "date"                  =>  "required",
            "amount"           =>  "required",
            "party_id"                 =>  "required",
        ]);

        $use = DieselUse::latest()->where('id', $id)->first();
        $use->date = $request->input('date');
        $use->amount = $request->input('amount');
        $use->party_id = $request->input('party_id');
        $use->update();
        return redirect()->route('diesel-uses.index')->with('success','Information updated successfully');

    }

    public function destroy($id)
    {
        $use = DieselUse::latest()->where('id', $id)->first();
        $use->delete();
        return redirect()->route('diesel-uses.index')
            ->with('success','Information deleted successfully');

    }
}
