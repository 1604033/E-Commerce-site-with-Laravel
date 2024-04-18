<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\product;
use App\Models\Category;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        if(!is_null($product))
        {
            return view('pages.products.show', compact('product'));
        }
        else
        {
            session()->flash('errors', 'sorry.....no any product!!');
            return redirect()->route('products');
        }
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $products = product::orWhere('title', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->orWhere('price', 'like', '%'.$search.'%')
        ->orWhere('quantity', 'like', '%'.$search.'%')
        ->orderBy('id', 'desc')
        ->paginate(9);
        return view('pages.products.search', compact('search', 'products'));
    }

    public function show_by_category($id)
    {
        $category = Category::find($id);
        if(!is_null($category))
        {
            return view('pages.products.show_by_category', compact('category'));
        }
        else
        {
            session()->flash('errors', 'sorry.....no any category!!');
            return redirect()->route('products');
        }
    }
}
