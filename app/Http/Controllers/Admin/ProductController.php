<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'tagline' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image',
                'features' => 'nullable|string', // comma separated
                'weight' => 'nullable|string',
                'ingredients' => 'nullable|string',
                'shelf_life' => 'nullable|string',
                'storage' => 'nullable|string',
                'is_visible_on_home' => 'nullable|boolean',
            ]);

            $validated['slug'] = Str::slug($request->name);
            $validated['is_visible_on_home'] = $request->has('is_visible_on_home');

            if ($request->features) {
                $validated['features'] = array_map('trim', explode(',', $request->features));
            }

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('products', 'public');
                $validated['image'] = $path;
            }

            Product::create($validated);

            return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id',
                'tagline' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image',
                'features' => 'nullable|string',
                'weight' => 'nullable|string',
                'ingredients' => 'nullable|string',
                'shelf_life' => 'nullable|string',
                'storage' => 'nullable|string',
                'is_visible_on_home' => 'nullable|boolean',
            ]);

            $validated['slug'] = Str::slug($request->name);
            $validated['is_visible_on_home'] = $request->has('is_visible_on_home');

            if ($request->features) {
                $validated['features'] = array_map('trim', explode(',', $request->features));
            }

            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }
                $path = $request->file('image')->store('products', 'public');
                $validated['image'] = $path;
            }

            $product->update($validated);

            return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
