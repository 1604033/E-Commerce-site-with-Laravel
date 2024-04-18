<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\product;

class PagesController extends Controller
{
    /*public function welcome(): View
    {
        return view('welcome');
    }*/
    public function welcome()
    {
        return view('welcome');
    }
    public function index()
    {
        return view('index');
    }
   
    public function tahir()
    {
        return view('tahirtalha');
    }
    public function testing()
    {
        return view('tester');
    }
    public function contact(): View
    {
        return view('contact');
    }
    public function blog(): View
    {
        return view('pages.blog');
    }
    public function home(): View
    {
        $products = product::orderBy('id','desc')->get();
        return view('pages.home')->with('products',$products);
    }

    public function products()
    {
        $products = product::orderBy('id','desc')->get();
        return view('pages.products')->with('products',$products);
    }
}
