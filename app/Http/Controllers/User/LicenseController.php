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

        $licenses = $user->licenses()->with('product')->orderBy('expiration_date')->get();

        return view('user.licenses.index', compact('licenses'));
    }
}
