<?php

namespace App\Http\Controllers;

use App\SoilSordar;
use Illuminate\Http\Request;

class SoilSordarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sorders = SoilSordar::latest()->paginate(12);
        return view('admin.soilsorder.index', compact('sorders'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.soilsorder.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
        ]);
        $customer = new SoilSordar();
        $customer->name = $request->input('name');
        $customer->save();

        return redirect()->back()
            ->with('success','Information added successfully.');

    }

    public function show(SoilSordar $sorder)
    {
        return view('admin.soilsorder.show', compact('sorder'));
    }

    public function edit($id)
    {
        $sordar = SoilSordar::latest()->where('id', $id)->get();
        return view('admin.soilsorder.edit', compact('sordar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name"      =>  "required",
            "balance"     =>  "required",
            "due"   =>  "required",
        ]);

        $sorder = SoilSordar::latest()->where('id', $id)->first();
        $sorder->name = $request->input('name');
        $sorder->balance = $request->input('balance');
        $sorder->due = $request->input('due');
        $sorder->update();
        return redirect()->route('soilsorder.index')->with('success','Information updated successfully');

    }


    public function destroy($id)
    {
        $sorder = SoilSordar::latest()->where('id', $id)->first();
        $sorder->delete();
        return redirect()->route('soilsorder.index')
            ->with('success','Information deleted successfully');

    }
}
