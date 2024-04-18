<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CheckoutsController;
use App\Http\Controllers\SettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*Route::get(
    '/user/profile',
    [UserProfileController::class, 'show']
)->name('profile');*/
//Route::get('/', 'PagesController@index');

Route::get('/welcome', [PagesController::class, 'welcome']);
Route::get('/tahir', [PagesController::class, 'tahir']);
Route::get('/index', [PagesController::class, 'index']);
Route::get('/test', [PagesController::class, 'testing']);

//homepage routes
Route::get('/', [PagesController::class, 'home'])->name('homepage');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/home', [PagesController::class, 'home']);


/*products routes
 all product added by here*/
Route::get('/product', [PagesController::class, 'products'])->name('product');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/new/search', [ProductController::class, 'search'])->name('search');

//category routes
Route::get('/product/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/product/category/{id}', [ProductController::class, 'show_by_category'])->name('categories.show');


//cart routes
Route::group(['prefix' => 'carts'], function(){
Route::get('/', [CartsController::class, 'index'])->name('carts');
Route::post('/store', [CartsController::class, 'store'])->name('carts.store');
Route::post('/update/{id}', [CartsController::class, 'update'])->name('carts.update');
Route::post('/delete/{id}', [CartsController::class, 'delete'])->name('carts.delete');
});

//Checkout routes
Route::group(['prefix' => 'checkout'], function(){
    Route::get('/', [CheckoutsController::class, 'index'])->name('checkouts');
    Route::post('/store', [CheckoutsController::class, 'store'])->name('checkouts.store');
    //Route::post('/update/{id}', [CartsController::class, 'update'])->name('carts.update');
    //Route::post('/delete/{id}', [CartsController::class, 'delete'])->name('carts.delete');
    });

//Payment settings routes
//Route::group(['prefix' => 'setting'], function(){
  //  Route::get('/', [SettingsController::class, 'create'])->name('settings.create');
    //Route::post('/', [SettingsController::class, 'store'])->name('settings.store');
    //});

    

/*admin routes
 admin panel are here*/
Route::group(['prefix' => 'admin'], function(){
    Route::get('/', [AdminPagesController::class, 'dashboard'])->name('admin.dashboard');
    //product
    Route::get('/products', [AdminPagesController::class, 'manage_products'])->name('admin.products');
    Route::get('/product/create', [AdminPagesController::class, 'create'])->name('admin.product.create');
    Route::get('/product/edit/{id}', [AdminPagesController::class, 'product_edit'])->name('admin.product.edit');
    
    Route::post('/product/create', [AdminPagesController::class, 'store'])->name('admin.product.store');
    Route::post('/product/edit/{id}', [AdminPagesController::class, 'product_update'])->name('admin.product.update');

   //category
    Route::get('/categories', [CategoryController::class, 'category_index'])->name('admin.categories');
    Route::get('/category/create', [CategoryController::class, 'category_create'])->name('admin.category.create');
    Route::get('/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('admin.category.edit');
    
    Route::post('/category/create', [CategoryController::class, 'category_store'])->name('admin.category.store');
    Route::post('/category/edit/{id}', [CategoryController::class, 'category_update'])->name('admin.category.update');

    //brand
    Route::get('/brands', [BrandController::class, 'brand_index'])->name('admin.brands');
    Route::get('/brand/create', [BrandController::class, 'brand_create'])->name('admin.brand.create');
    Route::get('/brand/edit/{id}', [BrandController::class, 'brand_edit'])->name('admin.brand.edit');
    
    Route::post('/brand/create', [BrandController::class, 'brand_store'])->name('admin.brand.store');
    Route::post('/brand/edit/{id}', [BrandController::class, 'brand_update'])->name('admin.brand.update');

});

// User Routes
Route::group(['prefix' => 'user'], function () {
    Route::get('/token/{token}', [VerificationController::class, 'verify'])->name('user.verification');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [UserController::class, 'profileUpdate'])->name('user.profile.update');
  });


//Route::get('/', [PagesController::class, 'welcome'])->name('welcome');
//Route::get('/tahir', function () {
//  return view('tahirtalha');
//});

Route::get('/user/{id}', [UserController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
