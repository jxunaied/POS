<?php

namespace App\Http\Controllers;

use App\MakingBricks;
use App\MilParty;
use Illuminate\Http\Request;

class MakingBricksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bricks = MakingBricks::latest()->paginate(12);
        return view('admin.bricks.index', compact('bricks'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        $milaprty = MilParty::all();
        return view('admin.bricks.create', compact('milaprty'));
    }


    public function store(Request $request)
    {
        $request->validate([
            "mil_party_id"                  =>  "required",
            "date"                          =>  "required",
            "brick_amount"                  =>  "required",
            "payable"                       =>  "required",
        ]);

        $brick = new MakingBricks();
        $brick->mil_party_id = $request->input('mil_party_id');
        $brick->date = $request->input('date');
        $brick->brick_amount = $request->input('brick_amount');
        $brick->payable = $request->input('payable');
        $brick->save();

        return redirect()->route('brick.index')
            ->with('success','Information added successfully.');

    }

    public function show(MakingBricks $brick)
    {
        return view('admin.bricks.show', compact('brick'));
    }

    public function edit(MakingBricks $brick)
    {
        $milaprty = MilParty::all();
        return view('admin.bricks.edit',compact('brick', 'milaprty'));
    }

    public function update(Request $request, MakingBricks $brick)
    {
        $request->validate([
            "mil_party_id"                  =>  "required",
            "date"                          =>  "required",
            "brick_amount"                  =>  "required",
            "payable"                       =>  "required",
        ]);

        $brick->mil_party_id = $request->input('mil_party_id');
        $brick->date = $request->input('date');
        $brick->brick_amount = $request->input('brick_amount');
        $brick->payable = $request->input('payable');
        $brick->update();
        return redirect()->route('brick.index')->with('success','Information updated successfully');

    }

    public function destroy(MakingBricks $brick)
    {
        $brick->delete();
        return redirect()->route('brick.index')
            ->with('success','Information deleted successfully');

    }
}
