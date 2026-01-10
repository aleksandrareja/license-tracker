<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductManagementController extends Controller
{
    public function index()
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $products = Product::all();

        // Logika wyświetlania listy produktów
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Logika wyświetlania formularza tworzenia produktu
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'version' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
        ]);

        Product::create($request->only('name', 'description', 'version', 'price'));

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $product = Product::findOrFail($id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'version' => 'required|string|max:50',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($request->only('name', 'description', 'version', 'price'));

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        if(auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
}
