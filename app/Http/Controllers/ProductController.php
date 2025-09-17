<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // List Products with Pagination
    public function index()
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    // Show form to create product
    public function create()
    {
        return view('products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully.');
    }

    // Show form to edit product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update product
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    // Delete product
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}
