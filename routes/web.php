<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProfileController;
use App\Http\Controllers\products\ProductCategoryController;
use App\Http\Controllers\products\ProductController;
use App\Http\Controllers\products\NewProductController;
use App\Http\Controllers\products\ProductItemsController;
use App\Http\Controllers\brands\BrandsController;
use App\Http\Controllers\productVariation\ProductVariationController;
use App\Http\Controllers\productvariation\ProductVariationOptionsController;
use App\Http\Controllers\roles\RolesController;
use App\Http\Controllers\user\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Dashboard Route
Route::get('login/user', [AuthController::class,'index'])->name('user.login.index');
Route::post('login/user/post', [AuthController::class,'login'])->name('user.login.post');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/home');
})->name('logout');

Route::get('user/profile', [ProfileController::class,'index'])->name('user.profile');


Route::get('home', [HomeController::class,'index'])->name('home.index');
Route::get('product/details/{id}', [HomeController::class,'productDetails'])->name('product.details');

Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {

//Dashboard Route
Route::get('/', function () {
    return view('welcome');
});

// Roles Management Route
Route::get('roles', [RolesController::class,'index'])->name('roles.index');
Route::get('roles/create', [RolesController::class,'create'])->name('roles.create');
Route::post('roles/store', [RolesController::class,'store'])->name('roles.store');
Route::get('roles/show/{id}', [RolesController::class,'show'])->name('roles.show');
Route::get('roles/destroy/{id}', [RolesController::class,'destroy'])->name('roles.destroy');
Route::get('roles/edit/{id}', [RolesController::class,'edit'])->name('roles.edit');
Route::post('roles/update/{id}', [RolesController::class,'update'])->name('roles.update');

// Users Roles
Route::get('users', [UserController::class,'index'])->name('users.index');
Route::get('users/create', [UserController::class,'create'])->name('user.create');
Route::post('users/store', [UserController::class,'store'])->name('user.store');
Route::get('users/show/{id}', [UserController::class,'show'])->name('user.show');
Route::get('users/destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');
Route::get('users/edit/{id}', [UserController::class,'edit'])->name('user.edit');
Route::post('users/update/{id}', [UserController::class,'update'])->name('user.update');
Route::get('users/password/edit/{id}', [UserController::class,'editPassword'])->name('user.password.edit');
Route::post('users/password/update/{id}', [UserController::class,'updatePassword'])->name('user.password.update');
Route::post('users/img/update/', [UserController::class,'updateImg'])->name('user.img.update');

});

//Route::get('login', [LoginController::class,'index'])->name('login');


// Login Routes
Route::get('login', [LoginController::class,'index'])->name('login');
Route::post('login/post', [LoginController::class,'authenticate'])->name('auth.login');


//Product Categories
Route::get('product/category', [ProductCategoryController::class,'index'])->name('category.index');
Route::get('product/category/create', [ProductCategoryController::class,'create'])->name('category.create');
Route::post('product/category/store', [ProductCategoryController::class,'store'])->name('category.store');
Route::get('product/category/show/{id}', [ProductCategoryController::class,'show'])->name('category.show');
Route::get('product/category/destroy/{id}', [ProductCategoryController::class,'destroy'])->name('category.destroy');
Route::get('product/category/edit/{id}', [ProductCategoryController::class,'edit'])->name('category.edit');
Route::post('product/category/update/{id}', [ProductCategoryController::class,'update'])->name('category.update');

//Product Variations
Route::get('product/variation', [ProductVariationController::class,'index'])->name('variation.index');
Route::get('product/variation/create', [ProductVariationController::class,'create'])->name('variation.create');
Route::post('product/variation/store', [ProductVariationController::class,'store'])->name('variation.store');
Route::get('product/variation/show/{id}', [ProductVariationController::class,'show'])->name('variation.show');
Route::get('product/variation/destroy/{id}', [ProductVariationController::class,'destroy'])->name('variation.destroy');
Route::get('product/variation/edit/{id}', [ProductVariationController::class,'edit'])->name('variation.edit');
Route::post('product/variation/update/{id}', [ProductVariationController::class,'update'])->name('variation.update');

//Product Variations Options
Route::get('product/variation/options', [ProductVariationOptionsController::class,'index'])->name('variation.option.index');
Route::get('product/variation/options/create', [ProductVariationOptionsController::class,'create'])->name('variation.option.create');
Route::post('product/variation/options/store', [ProductVariationOptionsController::class,'store'])->name('variation.option.store');
Route::get('product/variation/options/show/{id}', [ProductVariationOptionsController::class,'show'])->name('variation.option.show');
Route::get('product/variation/options/destroy/{id}', [ProductVariationOptionsController::class,'destroy'])->name('variation.option.destroy');
Route::get('product/variation/options/edit/{id}', [ProductVariationOptionsController::class,'edit'])->name('variation.option.edit');
Route::post('product/variation/options/update/{id}', [ProductVariationOptionsController::class,'update'])->name('variation.option.update');

// Route::get('products', [ProductController::class,'index'])->name('products.index');
Route::get('products', [NewProductController::class,'index'])->name('products.index');
//Route::get('product/create', [ProductController::class,'create'])->name('products.create');
Route::get('product/create', [NewProductController::class,'create'])->name('products.create');
//Route::post('product/store', [ProductController::class,'store'])->name('products.store');
Route::post('product/store', [NewProductController::class,'store'])->name('products.store');
Route::get('product/show/{id}', [ProductController::class,'show'])->name('products.show');
Route::get('product/destroy/{id}', [ProductController::class,'destroy'])->name('products.destroy');
Route::get('product/edit/{id}', [ProductController::class,'edit'])->name('products.edit');
Route::post('product/update/{id}', [ProductController::class,'update'])->name('products.update');

Route::get('product/items', [ProductItemsController::class,'index'])->name('product.items.index');
Route::get('product/items/create', [ProductItemsController::class,'create'])->name('product.items.create');
Route::post('product/items/store', [ProductItemsController::class,'store'])->name('product.items.store');
Route::get('product/items/show/{id}', [ProductItemsController::class,'show'])->name('product.items.show');
Route::get('product/items/destroy/{id}', [ProductItemsController::class,'destroy'])->name('product.items.destroy');
Route::get('product/items/edit/{id}', [ProductItemsController::class,'edit'])->name('product.items.edit');
Route::post('product/items/update/{id}', [ProductItemsController::class,'update'])->name('product.items.update');

//Brands
// Route::get('products', [ProductController::class,'index'])->name('products.index');
Route::get('brand', [BrandsController::class,'index'])->name('brands.index');
//Route::get('product/create', [ProductController::class,'create'])->name('products.create');
Route::get('brand/create', [BrandsController::class,'create'])->name('brands.create');
//Route::post('product/store', [ProductController::class,'store'])->name('products.store');
Route::post('brand/store', [BrandsController::class,'store'])->name('brands.store');