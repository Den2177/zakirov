<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $category = Category::create($request->all());

        return redirect()->route('admin');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin');
    }

    public function edit(Category $category)
    {
        return view('admin.category.index', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $category->update($request->all());
        return redirect()->route('admin');
    }
}
