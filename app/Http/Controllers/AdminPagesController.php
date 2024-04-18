<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\post;
use App\Models\ProductImage;
use Image;

class AdminPagesController extends Controller
{
    public function dashboard() : View
    {
        return view('admin.pages.dashboard');
    }

    public function create() : View
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('admin.pages.product.create', compact('main_categories'));
        //return view('admin.pages.product.create');
    }

    public function product_edit($id)
    {
        $product = product::find($id);
        return view('admin.pages.product.edit')->with('product',$product);
    }

    public function manage_products() : View
    {
        $products = product::orderBy('id','desc')->get();
        return view('admin.pages.product.index')->with('products',$products);
    }
    

    public function store(Request $request)
    {
       
        $request->validate([
            //'title' => ['required', 'unique:posts', 'max:255'],
            'title' => ['required', 'max:155'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ]);


        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;
        $product->slug = Str :: slug($product -> title);
        $product->save();


        if($request->hasFile('product_image')){
            $image = $request->file('product_image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('image/products/' .$img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
        }

        return redirect()->route('admin.products');
    }

    public function product_update(Request $request, $id)
    {
       
        $request->validate([
            //'title' => ['required', 'unique:posts', 'max:255'],
            'title' => ['required', 'max:155'],
            'description' => ['required'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
        ]);


        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;
        $product->slug = Str :: slug($product -> title);
        $product->save();


        /*if($request->hasFile('product_image')){
            $image = $request->file('product_image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('image/products/' .$img);
            Image::make($image)->save($location);

            $product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
        }*/

        return redirect()->route('admin.products');
    }

    
    
    /*public function store(Request $request)
    {
       $request->validate([
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'quality' => 'required'
       ]);

       $products = Post::create([
          'title' => $request->input('title'),
          'description'  => $request->input('description'),
          'price' => $request->input('price'),
          'quality' => $request->input('quality'),
          'category_id' => 1,
          'brand_id' => 1,
          'admin_id' => 1,
          'slug' => 1,
       ]);

        session()->flash('msg','new post added successfully!');

        return redirect()->route('admin.product.create', $add->id);
    }*/

    
}
