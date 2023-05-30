<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $ordersCount = auth()->user()->orders->count();
        return view('profile.index', compact('user', 'ordersCount'));
    }
}
