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
        $jj_products = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->limit(15)
            ->get();

        $khadees_products = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->limit(15)
            ->get();
//        dd($products);
        return view('frontend.pages.home', ['categories' => $categories,'products'=>$products,'jj_products'=>$jj_products,'khadees_products'=>$khadees_products]);

    }

    public function searchOption(Request $request) {
//        dd($request->searchKeyword);
        $html = '';
        $search = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->where('pr.product_name', 'like', '%' . trim($request->searchKeyword) . '%')
            ->limit(10)
            ->get();
//        dd($search);
        foreach ($search as $item) {
            $images = json_decode($item->product_images);
            $html .= '
                    <li class="d-block d-flex align-items-center">
                        <div class="search-result-img">
                            <img src="'.asset('product_images/'.$images[0]).'" class="w-100" alt="">
                        </div>
                        <div class="search-result-desc pl-10">
                            <a href="'.route('product.details', $item->id).'" class="title px-0">'.$item->product_name.'</a>
                            <div class="price">$<span>'.$item->price.'</span></div>
                        </div>
                    </li>';

        }

//    dd($html);

//        for ($i=0; $i<5; $i++) {
//        $html .= '
//                    <li class="d-block d-flex align-items-center">
//                        <div class="search-result-img">
//                            <img src="img/product/1.jpg" class="w-100" alt="">
//                        </div>
//                        <div class="search-result-desc pl-10">
//                            <a href="single-product-5.html" class="title px-0">ELLE  - Recliner synthetic chair</a>
//                            <div class="price">$<span>399</span></div>
//                        </div>
//                    </li>';
//        }
        return response()->json(['html' => $html]);

    }

    public function productDetails($id) {

//        $categories = DB::table('product_category')->get();
//        $user = \Illuminate\Support\Facades\Auth::user();
//
//        $user_id = $user->id;

        $product = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->where('pr.id', '=', $id)
            ->first();
        $related_products = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->limit(15)
            ->get();
        $product_images = json_decode($product->product_images);
    //    dd($size_check->status);
        return view('frontend.pages.product-detail', ['product'=>$product, 'product_images'=>$product_images,
        'related_products'=>$related_products]);
    }

    public function shop() {
        $products = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->paginate(15);
        return view('frontend.pages.shop', ['products'=>$products]);

    }

    public function addToCart(Request $request) {
//        dd($request->user_id);



        $categories = DB::table('product_category')->get();
        $user = \Illuminate\Support\Facades\Auth::user();
//        dd($user);
        if ($user === null ){
            return redirect()->route('user.login.index');
        }else {
            $user_id = $user->id;
        }

        //Check if product exists in cart
        $product_exists = DB::table('shopping_cart')
            ->leftJoin('shopping_cart_items', 'shopping_cart_items.cart_id', '=', 'shopping_cart.id')
            ->where('shopping_cart_items.product_item_id', '=', $request->product_item_id)
            ->where('shopping_cart.user_id', '=', $user_id)
            ->select('shopping_cart.*', 'shopping_cart_items.id as sci_id', 'product_item_id', 'qty', 'shopping_cart_items.cart_id')
            ->first();
        if ($product_exists !== null) {
//                    dd();

            $insertedId = DB::table('shopping_cart_items')
                ->where('shopping_cart_items.product_item_id', '=', $request->product_item_id)
                ->where('shopping_cart_items.cart_id', '=', $product_exists->cart_id)
                ->update([
                'qty' => $product_exists->qty + 1,
            ]);
        } else {

            $insertedId = DB::table('shopping_cart')->insertGetId([
                'user_id' => $user_id,
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

        }

        return redirect()->back();

    }

    public function deleteCart($cart_id ,$product_id) {

//        dd($cart_id ,$product_id);
        DB::table('shopping_cart')->where('id', '=', $cart_id)->delete();
        DB::table('shopping_cart_items')
            ->where('cart_id', '=', $cart_id)
            ->where('product_item_id', '=', $product_id)
            ->delete();
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

    public function updateMyCart(Request $request) {
//        dd($request);

        $update_status = DB::table('shopping_cart_items')
            ->where('shopping_cart_items.product_item_id', '=', $request->product_item_id)
            ->where('shopping_cart_items.cart_id', '=', $request->cart_id)
            ->update([
                'qty' => $request->val,
            ]);
        return $update_status;
    }

    public function createNewOrder() {
        $user = \Illuminate\Support\Facades\Auth::user();
//        dd($user);
        if ($user === null ){
            return redirect()->route('user.login.index');
        }else {
            $user_id = $user->id;
        }

        $cart_items = DB::table('shopping_cart as sc')
            ->leftJoin('shopping_cart_items as sci', 'sci.cart_id', '=', 'sc.id')
            ->leftJoin('new_products as np', 'np.id', '=', 'sci.product_item_id')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'np.id')
            ->where('sc.user_id', '=', $user_id)
            ->get();
        $profile = DB::table('users')
            ->where('id', '=', $user_id)
            ->first();
//        dd($cart_items,$profile);

        return view('frontend.pages.shop_order', ['cart_items'=>$cart_items, 'profile'=>$profile]);
    }

    public function createNewOrderPost(Request $request) {
dd($request);
    }

}
