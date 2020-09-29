<?php

namespace App\Http\Controllers;

use App\Sand;
use Illuminate\Http\Request;

class SandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sands= Sand::latest()->paginate(12);
        return view('admin.sand.index', compact('sands'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('admin.sand.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "date"            =>  "required",
            "quantity_cft"           =>  "required",
            "rate"                =>  "required",
            "truck_fair"            =>  "required",
            "place_name"         =>  "required"
        ]);

        $sand = new Sand();
        $sand->date = $request->input('date');
        $sand->drum_truck = $request->input('drum_truck');
        $sand->tc = $request->input('tc');
        $sand->quantity_cft = $request->input('quantity_cft');
        $sand->rate = $request->input('rate');
        $sand->truck_fair = $request->input('truck_fair');
        $sand->total_amount =  ($sand->quantity_cft * $sand->rate) +  $sand->truck_fair;
        $sand->place_name = $request->input('place_name');
        $sand->remarks = $request->input('remarks');
        $sand->save();

        return redirect()->route('sand.index')
            ->with('success','Information added successfully.');

    }

    public function show(Sand $sand)
    {
        return view('admin.sand.show', compact('sand'));
    }

    public function edit(Sand $sand)
    {
        return view('admin.sand.edit',compact('sand'));
    }

    public function update(Request $request, Sand $sand)
    {
        $request->validate([
            "date"            =>  "required",
            "quantity_cft"           =>  "required",
            "rate"                =>  "required",
            "truck_fair"            =>  "required",
            "place_name"         =>  "required"
        ]);

        $sand->date = $request->input('date');
        $sand->drum_truck = $request->input('drum_truck');
        $sand->tc = $request->input('tc');
        $sand->quantity_cft = $request->input('quantity_cft');
        $sand->rate = $request->input('rate');
        $sand->truck_fair = $request->input('truck_fair');
        $sand->total_amount =  ($sand->quantity_cft * $sand->rate) +  $sand->truck_fair;
        $sand->place_name = $request->input('place_name');
        $sand->remarks = $request->input('remarks');
        $sand->update();
        return redirect()->route('sand.index')->with('success','Information updated successfully');

    }

    public function destroy(Sand $sand)
    {
        $sand->delete();
        return redirect()->route('sand.index')
            ->with('success','Information deleted successfully');

    }
}
