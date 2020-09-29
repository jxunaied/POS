<?php

namespace App\Http\Controllers;

use App\LandOfUb;
use App\LandOwner;
use Illuminate\Http\Request;

class LandOfUbController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $lands = LandOfUb::latest()->paginate(12);
        return view('admin.land.index', compact('lands'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $owners = LandOwner::all();
        return view('admin.land.create', compact('owners'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "land_owners_id"                  =>  "required",
            "kata"           =>  "required",
            "decimal"                 =>  "required",
        ]);

        $land = new LandOfUb();
        $land->land_owners_id = $request->input('land_owners_id');
        $land->kata = $request->input('kata');
        $land->decimal = $request->input('decimal');
        $land->remarks = $request->input('remarks');
        $land->save();

        return redirect()->route('land.index')
            ->with('success','Information added successfully.');

    }

    public function show(LandOfUb $land)
    {
        return view('admin.land.show', compact('land'));
    }

    public function edit(LandOfUb $land)
    {
        $owners = LandOwner::all();
        return view('admin.land.edit',compact('land', 'owners'));
    }

    public function update(Request $request, LandOfUb $land)
    {
        $request->validate([
            "land_owners_id"                  =>  "required",
            "kata"           =>  "required",
            "decimal"                 =>  "required",
        ]);

        $land->land_owners_id = $request->input('land_owners_id');
        $land->kata = $request->input('kata');
        $land->decimal = $request->input('decimal');
        $land->remarks = $request->input('remarks');
        $land->update();
        return redirect()->route('land.index')->with('success','Information updated successfully');

    }

    public function destroy(LandOfUb $land)
    {
        $land->delete();
        return redirect()->route('land.index')
            ->with('success','Information deleted successfully');

    }
}
