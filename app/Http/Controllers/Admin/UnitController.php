<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view unit')->only('index');
        $this->middleware('permission:create unit')->only(['create', 'store']);
        $this->middleware('permission:edit unit')->only(['edit', 'update']);
        $this->middleware('permission:delete unit')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Unit::latest()->get();
        return view('admin.unit.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $shop=Shop::where('status',1)->get();
        return view('admin.unit.create',compact('shop'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Unit::create($data);
        return redirect()->route('admin.units.index')->with('success', 'Data Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Unit::findOrFail($id);
        $shop=Shop::where('status',1)->get();
        return view('admin.unit.edit', compact('data','shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Unit::findOrFail($id);
        $input = $request->all();

        $data->update($input);
        return redirect()->route('admin.units.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Unit::findOrFail($id);

        $data->delete();
        return redirect()->back( )->with('success', 'Data Delete Successfully');
    }
}