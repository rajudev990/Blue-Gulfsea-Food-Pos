<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebsiteController extends Controller
{
    public function home()
    {
        if (Auth::guard('shop')->check()) {
            return redirect()->route('shop.dashboard');
        }
        return view('shop.login');
    }
}
