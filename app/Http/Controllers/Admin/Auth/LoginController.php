<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    // Shop
    public function showLoginFormShop()
    {
        if (Auth::guard('shop')->check()) {
            return redirect()->route('shop.dashboard');
        }
        return view('shop.login');
    }
    public function shoplogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt login with additional status check
        if (Auth::guard('shop')->attempt(array_merge($credentials, ['status' => 1]))) {
            return redirect()->intended('/shop/dashboard');
        }

        // Check if email exists but status is not active
        $shop = Shop::where('email', $request->email)->first();
        if ($shop && $shop->status != 1) {
            return back()->withErrors([
                'email' => 'Your account is inactive. Please contact admin.',
            ]);
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }


    public function shoplogout()
    {
        Auth::guard('shop')->logout();
        return redirect('/');
    }

    
    // Admin
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
