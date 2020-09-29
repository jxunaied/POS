<?php

namespace App\Http\Controllers;

use App\LandOwner;
use Illuminate\Http\Request;

class LandOwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $owners = LandOwner::latest()->paginate(12);
        return view('admin.landowner.index', compact('owners'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.landowner.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required",
        ]);
        $owner= new LandOwner();
        $owner->name = $request->input('name');
        $owner->save();

        return redirect()->back()
            ->with('success','Information added successfully.');

    }

    public function show(LandOwner $owner)
    {
        return view('admin.landowner.show', compact('owner'));
    }

    public function edit($id)
    {
        $owner = LandOwner::latest()->where('id', $id)->get();
        return view('admin.landowner.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name"      =>  "required",
            "balance"     =>  "required",
            "due"   =>  "required",
        ]);

        $owner = LandOwner::latest()->where('id', $id)->first();
        $owner->name = $request->input('name');
        $owner->balance = $request->input('balance');
        $owner->due = $request->input('due');
        $owner->update();
        return redirect()->route('landowner.index')->with('success','Information updated successfully');

    }


    public function destroy($id)
    {
        $owner = LandOwner::latest()->where('id', $id)->first();
        $owner->delete();
        return redirect()->route('landowner.index')
            ->with('success','Information deleted successfully');

    }
}
