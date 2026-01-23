<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\License;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LicenseManagementController extends Controller
{
    public function index()
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Get all licenses with related product information, ordered by status and expiration date
        $licenses = License::with('product')
            ->get()
            ->sortBy(function($license) {
                return $license->effective_status;
            })
            ->values();


        // Return view with the list of licenses
        return view('admin.licenses.index', compact('licenses'));
    }

    public function add()
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $products = Product::all();

        return view('admin.licenses.add', compact('products'));
    }

    public function store(Request $request)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'key' => 'required|string|unique:licenses,key',
            'max_users' => 'required|integer|min:1',
            'expiration_date' => 'nullable|date',
            'status' => 'required|in:active,suspended',
            'price' => 'required|numeric|min:0',
        ]);

        License::create($request->only('product_id', 'key', 'max_users', 'expiration_date', 'status', 'price'));

        return redirect()->route('admin.licenses')->with('success', 'License created successfully.');
    }

    public function edit($id)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $license = License::findOrFail($id);
        $products = Product::all();


        return view('admin.licenses.edit', compact('license', 'products'));
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $license = License::findOrFail($id);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'key' => 'required|string|unique:licenses,key,' . $license->id,
            'max_users' => 'required|integer|min:1',
            'expiration_date' => 'nullable|date',
            'status' => 'required|in:active,suspended',
            'price' => 'required|numeric|min:0',
        ]);

        $license->update($request->only('product_id', 'key', 'max_users', 'expiration_date', 'status', 'price'));

        return redirect()->route('admin.licenses')->with('success', 'License updated successfully.');
    }

    public function delete($id)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $license = License::findOrFail($id);
        $license->delete();

        return redirect()->route('admin.licenses')->with('success', 'License deleted successfully.');
    }

    public function users($licenseId)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $license = License::with(['users', 'product'])->findOrFail($licenseId);
        $users = $license->users;
        $other_users = User::whereNotIn('id', $users->pluck('id'))->get();

        return view('admin.licenses.users', compact('license', 'users', 'other_users'));
    }

    public function remove_user(Request $request, $id)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $license = License::findOrFail($id);

        $license->users()->detach($request->user_id);

        return redirect()->route('admin.licenses.users', $license->id)->with('success', 'User removed from license successfully.');
    }


    public function add_user(Request $request, $id)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

         $license = License::findOrFail($id);

        if ($license->countCurrentUsers()+1 > $license->max_users) {
            return redirect()->route('admin.licenses.users', $id)->with('error', 'Cannot add more users to this license. Maximum limit reached.');
        }

        //INSERT INTO license_user (license_id, user_id) VALUES (?, ?)
        $license->users()->attach($request->user_id);

        return redirect()->route('admin.licenses.users', $license->id)->with('success', 'User added to license successfully.');
    }
}

    
