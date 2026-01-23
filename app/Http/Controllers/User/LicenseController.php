<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index()
    {
        // Return list of licenses for the authenticated user
        $user = auth()->user();

        $licenses = $user->licenses()
            ->with('product')
            ->get()
            ->sortBy(function($license) {
                return $license->effective_status;
            })
            ->values();

        return view('user.licenses.index', compact('licenses'));
    }
}
