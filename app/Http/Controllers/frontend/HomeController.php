<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {

        $categories = DB::table('product_category')->get();
        $products = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->get();
//        dd($products);
        return view('frontend.pages.home', ['categories' => $categories,'products'=>$products]);

    }

    public function productDetails($id) {

//        $categories = DB::table('product_category')->get();
        $product = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->where('pr.id', '=', $id)
            ->first();
        $related_products = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->limit(15)
            ->get();
        $product_images = json_decode($product->product_images);
//        dd($product);
        return view('frontend.pages.product-detail', ['product'=>$product, 'product_images'=>$product_images,'related_products'=>$related_products]);
    }

    public function shop() {
        $products = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->paginate(15);
        return view('frontend.pages.shop', ['products'=>$products]);

    }

    public function addToCart(Request $request) {
//        dd($request->user_id);

        $insertedId = DB::table('shopping_cart')->insertGetId([
            'user_id' => $request->user_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

//        dd($insertedId);

        $insertedId = DB::table('shopping_cart_items')->insertGetId([
            'cart_id' => $insertedId,
            'product_item_id' => $request->product_item_id,
            'qty' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back();

    }

    public function myCart() {
        $user_id = Auth::user()->id;
        $cart_items = DB::table('shopping_cart as sc')
            ->leftJoin('shopping_cart_items as sci', 'sci.cart_id', '=', 'sc.id')
            ->leftJoin('new_products as np', 'np.id', '=', 'sci.product_item_id')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'np.id')
            ->where('sc.user_id', '=', $user_id)
            ->get();
//        dd($cart_items);
        return view('frontend.pages.cart-items', ['cart_items'=>$cart_items]);
    }
}
