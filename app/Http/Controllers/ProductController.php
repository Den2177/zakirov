<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image',
            'category_id' => 'required|exists:categories,id',
            'about' => 'required|string',
            'price' => 'required',
        ]);

        $data = $request->all();
        $data['image'] = $this->saveImage($request->file('image'));
        Product::create($data);
        return redirect()->route('admin');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.product.index', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->all();
        if (isset($data['image'])) {
            $data['image'] = $this->saveImage($request->file('image'));
        }
        $product->update($data);

        return redirect()->route('admin');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }
}
