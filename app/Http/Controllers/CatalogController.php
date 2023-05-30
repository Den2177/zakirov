<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {

        $categories = Category::all();
        $products = Product::filter();

        return view('catalog.index', compact('products', 'categories'));
    }
}
