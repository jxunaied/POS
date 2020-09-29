<?php

namespace App\Http\Controllers;

use App\MilParty;
use Illuminate\Http\Request;

class MilPartyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $owners = MilParty::latest()->paginate(12);
        return view('admin.milparty.index', compact('owners'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.milparty.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
        ]);
        $owner= new MilParty();
        $owner->name = $request->input('name');
        $owner->save();

        return redirect()->back()
            ->with('success','Information added successfully.');

    }

    public function show(MilParty $owner)
    {
        return view('admin.milparty.show', compact('owner'));
    }

    public function edit($id)
    {
        $owner = MilParty::latest()->where('id', $id)->get();
        return view('admin.milparty.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name"      =>  "required",
            "balance"     =>  "required",
            "due"   =>  "required",
        ]);

        $owner = MilParty::latest()->where('id', $id)->first();
        $owner->name = $request->input('name');
        $owner->balance = $request->input('balance');
        $owner->due = $request->input('due');
        $owner->update();
        return redirect()->route('milparty.index')->with('success','Information updated successfully');

    }


    public function destroy($id)
    {
        $owner = MilParty::latest()->where('id', $id)->first();
        $owner->delete();
        return redirect()->route('milparty.index')
            ->with('success','Information deleted successfully');

    }
}
