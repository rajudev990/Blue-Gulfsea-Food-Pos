<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view sales')->only('index');
        $this->middleware('permission:create sales')->only(['create', 'store']);
        $this->middleware('permission:edit sales')->only(['edit', 'update']);
        $this->middleware('permission:delete sales')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sale::latest()->get();
        return view('admin.sale.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.sale.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Sale::create($data);
        return redirect()->route('admin.sales.index')->with('success', 'Data Create Successfully');
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
        $data = Sale::findOrFail($id);
        return view('admin.sale.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Sale::findOrFail($id);
        $input = $request->all();

        $data->update($input);
        return redirect()->route('admin.sales.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Sale::findOrFail($id);

        $data->delete();
        return redirect()->back( )->with('success', 'Data Delete Successfully');
    }
}