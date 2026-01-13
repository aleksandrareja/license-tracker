<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LicenseController extends Controller
{
    public function index()
    {
        // Pobierz zalogowanego użytkownika
        $user = auth()->user();

        $licenses_active = $user->licenses()->with('product')->where('status', 'active')->orderBy('expiration_date')->get();
        $licenses_expired = $user->licenses()->with('product')->whereIn('status', ['expired', 'suspended'])->orderBy('expiration_date')->get();

        return view('user.licenses.index', compact('licenses_active', 'licenses_expired'));
    }
}
