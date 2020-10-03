<?php

namespace App\Http\Controllers;

use App\DieselMil;
use Illuminate\Http\Request;

class DiselMilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $dieselmils = DieselMil::latest()->paginate(12);
        return view('admin.dieselmil.index', compact('dieselmils'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('admin.dieselmil.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "name"            =>  "required",
        ]);

        $coal = new DieselMil();
        $coal->name = $request->input('name');
        $coal->save();

        return redirect()->route('diesel.index')
            ->with('success','Information added successfully.');

    }

    public function show(DieselMil $diselmil)
    {
        return view('admin.dieselmil.show', compact('diselmil'));
    }

    public function edit($id)
    {
        $diselmil = DieselMil::latest()->where('id', $id)->get();
        return view('admin.dieselmil.edit',compact('diselmil'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name"            =>  "required",
        ]);

        $diselmil = DieselMil::latest()->where('id', $id)->first();
        $diselmil->name = $request->input('name');
        $diselmil->update();
        return redirect()->route('diesel.index')->with('success','Information updated successfully');

    }

    public function destroy($id)
    {
        $diselmil = DieselMil::latest()->where('id', $id)->first();
        $diselmil->delete();
        return redirect()->route('diesel.index')
            ->with('success','Information deleted successfully');

    }
}
