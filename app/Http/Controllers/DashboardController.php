<?php

namespace App\Http\Controllers;

use App\Models\License;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $expiringLicenses = License::with('product')->orderBy('expiration_date', 'asc')->get()->filter(fn($license) => $license->expiresSoon());

        $usersExpiringLicenses = $user->licenses()->with('product')->orderBy('expiration_date', 'asc')->get()->filter(fn($license) => $license->expiresSoon());

        if ($user->role === 'admin') {
            return view('dashboard.admin', compact('user', 'expiringLicenses'));
        }

        return view('dashboard.user', compact('user', 'usersExpiringLicenses'));
    }
}
