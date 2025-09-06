<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view shop')->only('index');
        $this->middleware('permission:create shop')->only(['create', 'store']);
        $this->middleware('permission:edit shop')->only(['edit', 'update']);
        $this->middleware('permission:delete shop')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Shop::all();
        return view('admin.shops.index', compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.shops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:shops,name',
            'email' => 'required|unique:shops,email',
        ]);

        $data = $request->all();
        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;
        $data['image'] = $image;

        $data['password'] = bcrypt($request->password);

        Shop::create($data);
        return redirect()->route('admin.shops.index')->with('success', 'Shop Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Shop::findOrFail($id);
        return view('admin.shops.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Shop::findOrFail($id);
        return view('admin.shops.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Shop::findOrFail($id);

        // Validation
        $request->validate([
            'name'  => 'required|unique:shops,name,' . $data->id,
            'email' => 'required|unique:shops,email,' . $data->id,
            'password' => 'nullable|min:6', // password optional
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // image validation
        ]);

        $updateData = $request->only(['name', 'email', 'phone', 'address', 'status']);

        // Image handling
        if ($request->hasFile('image')) {
            $image = ImageHelper::uploadImage($request->file('image'));

            // Delete old image
            if ($data->image) {
                Storage::disk('public')->delete($data->image);
            }

            $updateData['image'] = $image;
        }

        // Password handling
        if ($request->filled('password')) {
            $updateData['password'] = bcrypt($request->password);
        }

        // Update shop
        $data->update($updateData);

        return redirect()->route('admin.shops.index')
            ->with('success', 'Shop Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Shop::findOrFail($id);
        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        return redirect()->back()->with('success', 'Data Deleted Successfully');
    }
    public function updateStatus(Request $request)
    {
        $item = Unit::findOrFail($request->id);
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
