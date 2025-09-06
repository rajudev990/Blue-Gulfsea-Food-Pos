<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopProfileController extends Controller
{
    public function settings()
    {
        return view('shop.settings');
    }
    public function changePassword()
    {
        return view('shop.change-password');
    }
    
    public function updateSettings(Request $request)
    {
        $shop = auth('shop')->user();

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:shops,email,' . $shop->id,
            'phone'  => 'nullable|string|max:20',
            'address'=> 'nullable|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Prepare update data
        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'address' => $request->address,
        ];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($shop->image && Storage::disk('public')->exists($shop->image)) {
                Storage::disk('public')->delete($shop->image);
            }

            // Upload new image
            $data['image'] = ImageHelper::uploadImage($request->file('image'));
        }

        // Update shop profile
        $shop->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }




    public function updatePassword(Request $request)
    {
        $shop = auth('shop')->user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!\Hash::check($request->current_password, $shop->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        $shop->update([
            'password' => \Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }
}
