<?php

namespace App\Http\Controllers;

use App\Mati;
use App\SoilSordar;
use Illuminate\Http\Request;

class MatiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $matis = Mati::latest()->paginate(12);
        return view('admin.mati.index', compact('matis'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $sordars = SoilSordar::all();
        return view('admin.mati.create', compact('sordars'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "soil_sorder_id"                  =>  "required",
            "measurement"           =>  "required",
            "total_cft"                 =>  "required",
            "rate"    =>  "required",
            "amount"             =>  "required",
        ]);

        $mati = new Mati();
        $mati->soil_sorder_id = $request->input('soil_sorder_id');
        $mati->measurement = $request->input('measurement');
        $mati->total_cft = $request->input('total_cft');
        $mati->rate = $request->input('rate');
        $mati->amount = $request->input('amount');
        $mati->remarks = $request->input('remarks');
        $mati->save();

        return redirect()->route('mati.index')
            ->with('success','Information added successfully.');

    }

    public function show(Mati $mati)
    {
        return view('admin.mati.show', compact('mati'));
    }

    public function edit(Mati $mati)
    {
        $sordars = SoilSordar::all();
        return view('admin.mati.edit',compact('mati', 'sordars'));
    }

    public function update(Request $request, Mati $mati)
    {
        $request->validate([
            "soil_sorder_id"                  =>  "required",
            "measurement"           =>  "required",
            "total_cft"                 =>  "required",
            "rate"    =>  "required",
            "amount"             =>  "required",
        ]);

        $mati->soil_sorder_id = $request->input('soil_sorder_id');
        $mati->measurement = $request->input('measurement');
        $mati->total_cft = $request->input('total_cft');
        $mati->rate = $request->input('rate');
        $mati->amount = $request->input('amount');
        $mati->remarks = $request->input('remarks');
        $mati->update();
        return redirect()->route('mati.index')->with('success','Information updated successfully');

    }

    public function destroy(Mati $mati)
    {
        $mati->delete();
        return redirect()->route('mati.index')
            ->with('success','Information deleted successfully');

    }
}
