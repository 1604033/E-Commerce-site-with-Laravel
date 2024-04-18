<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Brand;
use Illuminate\Support\Str;
use App\post;
use Image;
use File;

class BrandController extends Controller
{
    public function brand_index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('admin.pages.brand.index', compact('brands'));
    }

    public function brand_create()
    {
        //$main_brands = Brand::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        return view('admin.pages.brand.create');
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
    

    public function brand_store(Request $request)
    {
       
        $request->validate([
            //'title' => ['required', 'unique:posts', 'max:255'],
            'name' => ['required', 'max:155'],
            'image' => ['nullable'],
            //'description' => ['required'],
            //'image' => ['nullable|image'],
        ],
        [
            'name.required' => 'Please provide a brand name',
            'image.required' => 'Please provide a image',
        ],
    );


        $brand = new Brand();

        $brand->name = $request->name;
        $brand->description = $request->description;
        //$brand->parent_id = $request->parent_id;
        $brand->save();
        
    //Inserting image

        /*if(count($request->image) > 0){
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('image/brands/' .$img);
            Image::make($image)->save($location);
            $brand->image = $img;

            /*$product_image = new ProductImage;
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save();
        }*/
        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('image/brands/' .$img);
            Image::make($image)->save($location);

            //$product_image = new ProductImage;
            //$product_image->product_id = $product->id;
            $brand->image = $img;
            $brand->save();
        }
        
        
        session()->flash('success', 'A new brand has added successfully!!');
        return redirect()->route('admin.brands');
    }

    public function brand_edit($id)
    {
        //$main_brands = Brand::orderBy('name', 'desc')->where('parent_id', NULL)->get();
        $brand = Brand::find($id);
        if(!is_null($brand))
        {
            return view('admin.pages.brand.edit', compact('brand'));
        }
        else
        {
            return redirect()->route('admin.brands');
        }

        //return redirect()->route('admin.products');
    }
    
    public function brand_update(Request $request, $id)
    {
       
        $request->validate([
            //'title' => ['required', 'unique:posts', 'max:255'],
            //'name' => ['required', 'max:155'],
            //'image' => ['nullable|image'],
            //'description' => ['required'],
            //'image' => ['nullable|image'],
        ],
        [
            'name.required' => 'Please provide a brand name',
            'image.required' => 'Please provide a image',
        ],
        );


        $brand = Brand::find($id);

        $brand->name = $request->name;
        $brand->description = $request->description;
        //$brand->parent_id = $request->parent_id;
        
    //Updating image
      if($request->hasFile('image'))
      {
        if(File::exists('image/brands/'.$brand->image))
        {
            File::delete('image/brands/'.$brand->image);
        } 

            $image = $request->file('image');
            $img = time() . '.'. $image->getClientOriginalExtension();
            $location = public_path('image/brands/' .$img);
            Image::make($image)->save($location);

            //$product_image = new ProductImage;
            //$product_image->product_id = $product->id;
            $brand->image = $img;
           
      }
        $brand->save();
        session()->flash('success', 'This brand has updated successfully!!');
        return redirect()->route('admin.brands');
    }
}
