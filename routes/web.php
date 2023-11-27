<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\frontend\AuthController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProfileController;
use App\Http\Controllers\products\ProductCategoryController;
use App\Http\Controllers\products\ProductController;
use App\Http\Controllers\shop\ShopController;
use App\Http\Controllers\products\NewProductController;
use App\Http\Controllers\products\ProductItemsController;
use App\Http\Controllers\brands\BrandsController;
use App\Http\Controllers\productVariation\ProductVariationController;
use App\Http\Controllers\productVariation\ProductVariationOptionsController;
use App\Http\Controllers\roles\RolesController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\frontend\UserSizeController;
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
Route::get('home', [HomeController::class,'index'])->name('home.index');
Route::get('/', function (){
    return redirect('/home');
});
Route::get('', function (){
    return redirect('/home');
});

//Dashboard Route
Route::get('login/user', [AuthController::class,'index'])->name('user.login.index');
Route::post('login/user/post', [AuthController::class,'login'])->name('user.login.post');
Route::post('pd/login/user/post', [AuthController::class,'pdlogin'])->name('pd.login.post');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/home');
})->name('logout');

Route::get('user/profile', [ProfileController::class,'index'])->name('user.profile');
Route::post('user/profile/update', [ProfileController::class,'profileUpdate'])->name('profile.update');

Route::get('user/address/', [ProfileController::class,'viewAddress'])->name('user.view.address');
Route::get('user/address/create', [ProfileController::class,'createAddress'])->name('user.create.address');
Route::post('user/address/create/post', [ProfileController::class,'createAddressPost'])->name('user.post.address');
Route::get('user/address/edit/{id}', [ProfileController::class,'editAddress'])->name('user.edit.address');
Route::post('user/address/update/{id}', [ProfileController::class,'updateAddress'])->name('user.update.address');
Route::get('my/orders/', [ProfileController::class,'myOrders'])->name('my.orders');
Route::get('orders/receipt/{id}', [ProfileController::class,'myOrderReceipt'])->name('my.order.receipt');
Route::get('my/size/', [ProfileController::class,'mySize'])->name('mySize');

Route::get('user/whishlist', [ProfileController::class,'userWhishList'])->name('user.whishlist');


Route::get('about-us', [HomeController::class,'aboutUs'])->name('home.about');
Route::get('contact-us', [HomeController::class,'contactUs'])->name('home.contact');
Route::get('talk-to-darrzi', [HomeController::class,'taktoDarrzi'])->name('taktoDarrzi');
Route::post('size/store', [UserSizeController::class,'store'])->name('size.store');
Route::get('product/details/{id}', [HomeController::class,'productDetails'])->name('product.details');

Route::get('shop', [HomeController::class,'shop'])->name('shop.index');
Route::get('shopFilters', [HomeController::class,'shopFilters'])->name('shopFilters');

Route::post('add/to/cart', [HomeController::class,'addToCart'])->name('add.to.cart');
Route::post('add/to/cart/customization', [HomeController::class,'addToCartWithCustomization'])->name('add.to.cart.customization');
Route::get('my/cart/items', [HomeController::class,'myCart'])->name('my.cart.items');
Route::post('update/my/cart/items', [HomeController::class,'updateMyCart'])->name('update.my.cart.items');
Route::get('delete/cart/item/{cart_id}/{product_id}', [HomeController::class,'deleteCart'])->name('delete.cart.item');

Route::get('add/to/whishlist/{product_id}', [ProfileController::class,'addToWishList'])->name('add.to.whishlist');
Route::get('delete/whishlist/{id}/{product_id}', [ProfileController::class,'deleteWhishlist'])->name('delete.whishlist.item');


Route::get('create/new/order', [HomeController::class,'createNewOrder'])->name('create.new.order');
Route::post('create/new/order/post', [HomeController::class,'createNewOrderPost'])->name('create.new.order.post');


Route::middleware([\App\Http\Middleware\Authenticate::class])->group(function () {

//Dashboard Route
// Route::get('admin/dashboard', function () {
// })->name('admin.dashboard');

Route::get('admin/dashboard', [Dashboard::class,'index'])->name('admin.dashboard');


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
Route::get('product/variation/index', [ProductVariationController::class,'index'])->name('variation.index');
Route::get('product/variation/create', [ProductVariationController::class,'create'])->name('variation.create');
Route::post('product/variation/store', [ProductVariationController::class,'store'])->name('variation.store');
Route::get('product/variation/show/{id}', [ProductVariationController::class,'show'])->name('variation.show');
Route::get('product/variation/destroy/{id}', [ProductVariationController::class,'destroy'])->name('variation.destroy');
Route::get('product/variation/edit/{id}', [ProductVariationController::class,'edit'])->name('variation.edit');
Route::post('product/variation/update/{id}', [ProductVariationController::class,'update'])->name('variation.update');

//Product Variations Options
Route::get('product/variations/options', [ProductVariationOptionsController::class,'index'])->name('variation.option.index');
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

Route::get('shop/order', [ShopController::class,'index'])->name('shop.order.index');
Route::get('shop/order/edit/{id}', [ShopController::class,'edit'])->name('shop.order.edit');
Route::post('shop/update/{id}', [ShopController::class,'update'])->name('shop.update');

//Brands
// Route::get('products', [ProductController::class,'index'])->name('products.index');
Route::get('brand', [BrandsController::class,'index'])->name('brands.index');
//Route::get('product/create', [ProductController::class,'create'])->name('products.create');
Route::get('brand/create', [BrandsController::class,'create'])->name('brands.create');
//Route::post('product/store', [ProductController::class,'store'])->name('products.store');
Route::post('brand/store', [BrandsController::class,'store'])->name('brands.store');


// Api routes
Route::get('searchOption', [HomeController::class,'searchOption'])->name('searchOption');

