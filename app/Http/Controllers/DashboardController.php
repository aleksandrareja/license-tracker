<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $licenses = License::with('product')->get();
        $expiringLicenses = $licenses->filter(fn($license) => $license->ifExpiresSoon());

        if ($user->role === 'admin') {
            return view('dashboard.admin', compact('user', 'expiringLicenses'));
        }

        return view('dashboard.user', compact('user', 'expiringLicenses'));
    }
}
