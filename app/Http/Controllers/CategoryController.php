<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Category;
use Illuminate\Support\Str;
use App\post;
use Image;
use File;

class CategoryController extends Controller
{
    
    public function category_index()
    {
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function category_create()
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('admin.pages.category.create', compact('main_categories'));
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
    

    public function category_store(Request $request)
    {
       
        $request->validate([
            //'title' => ['required', 'unique:posts', 'max:255'],
            'name' => ['required', 'max:155'],
            'image' => ['nullable'],
            //'description' => ['required'],
            //'image' => ['nullable|image'],
        ],
        [
            'name.required' => 'Please provide a category name',
            'image.required' => 'Please provide a image',
        ],
    );


        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->save();
        
    //Inserting image

        /*if(count($request->image) > 0){
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('image/categories/' .$img);
            Image::make($image)->save($location);
            $category->image = $img;

            /*$product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
        }*/
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('image/categories/' .$img);
            Image::make($image)->save($location);

            //$product_image = new ProductImage;
            //$product_image->product_id = $product->id;
            $category->image = $img;
            $category->save();
        }
        
        
        session()->flash('success', 'A new category has added successfully!!');
        return redirect()->route('admin.categories');
    }

    public function category_edit($id)
    {
        $main_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $category = Category::find($id);
        if(!is_null($category))
        {
            return view('admin.pages.category.edit', compact('category', 'main_categories'));
        }
        else
        {
            return redirect()->route('admin.categories');
        }

        //return redirect()->route('admin.products');
    }
    
    public function category_update(Request $request, $id)
    {
       
        $request->validate([
            //'title' => ['required', 'unique:posts', 'max:255'],
            //'name' => ['required', 'max:155'],
            //'image' => ['nullable|image'],
            //'description' => ['required'],
            //'image' => ['nullable|image'],
        ],
        [
            'name.required' => 'Please provide a category name',
            'image.required' => 'Please provide a image',
        ],
        );


        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        
    //Updating image
      if($request->hasFile('image'))
      {
        if(File::exists('image/categories/'.$category->image))
        {
            File::delete('image/categories/'.$category->image);
        } 

            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('image/categories/' .$img);
            Image::make($image)->save($location);

            //$product_image = new ProductImage;
            //$product_image->product_id = $product->id;
            $category->image = $img;
           
      }
        $category->save();
        session()->flash('success', 'This category has updated successfully!!');
        return redirect()->route('admin.categories');
    }
}
