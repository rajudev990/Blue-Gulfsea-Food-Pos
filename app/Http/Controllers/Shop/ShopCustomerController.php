<?php

namespace App\Http\Controllers\Shop;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Customer::where('shop_id', auth()->guard('shop')->id())->latest()->get();
        return view('shop.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shop.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;
        $data['image'] = $image;
        $data['shop_id'] = auth()->guard('shop')->id();
        Customer::create($data);
        return redirect()->route('shop.customers.index')->with('success', 'Data Create Successfully');
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
        $data = Customer::where('shop_id', auth()->guard('shop')->id())->findOrFail($id);
        return view('shop.customer.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Customer::findOrFail($id);


        
    $image = $request->hasFile('image') 
        ? ImageHelper::uploadImage($request->file('image')) 
        : null;

    
    if ($image && $data->image) {
        Storage::disk('public')->delete($data->image);
    }

        $input = $request->all();
        
        if ($image) {
        $input['image'] = $image;
    }

        $input['shop_id'] = auth()->guard('shop')->id();
        $data->update($input);
        return redirect()->route('shop.customers.index')->with('success', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data Delete Successfully');
    }

    public function updateStatus(Request $request)
    {
        $item = Customer::findOrFail($request->id);
        $item->status = $request->status;
        $item->save();

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'status' => $item->status,
                'message' => $item->status == 1
                    ? 'Status has been activated successfully.'
                    : 'Status has been deactivated successfully.'
            ]);
        }

        // In case it's not an AJAX request, redirect with a success message
        return back()->with('success', 'Status has been updated successfully.');
    }
}
