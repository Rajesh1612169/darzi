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
            ->limit(8)
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

    public function contactUs() {
        return view('frontend.pages.contact',);
    }

    public function taktoDarrzi() {
        return view('frontend.pages.talto-darrzi',);
    }

    public function aboutUs() {
        return view('frontend.pages.about',);
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

    public function shop(Request $request) {


//        dd($request);
//        dd($_GET['category_id']);

//        if (isset($_GET['range-min']) && $_GET['range-min']) {
//
//            $products = DB::table('new_products as pr')
//            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
//            // ->where('category_id', '=', $_GET['category_id'])
//            ->whereBetween('pr.price', [$_GET['range-min'], $_GET['range-max']]) // Filter products based on price range
//            ->paginate(15);
//            $featured_products = DB::table('new_products as pr')
//            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
//            ->paginate(4);
//
//        return view('frontend.pages.shop', ['products'=>$products,'featured_products'=> $featured_products]);
//        }

        if (isset($_GET['category_id']) && $_GET['category_id']) {
            $products = DB::table('new_products as pr')
                ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
                ->where('category_id', '=', $_GET['category_id'])
                ->paginate(15);
            $featured_products = DB::table('new_products as pr')
                ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
                ->paginate(4);
            return view('frontend.pages.shop', ['products'=>$products,'featured_products'=> $featured_products]);
        }

        else {
            $products = DB::table('new_products as pr')
                ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
                ->paginate(15);
            $featured_products = DB::table('new_products as pr')
                ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
                ->paginate(4);
            return view('frontend.pages.shop', ['products'=>$products,'featured_products'=> $featured_products]);

        }

    }

    public function shopFilters(Request $request) {
//        dd($request);

//        $products = DB::table('new_products as pr')
//            ->select('pr.*') // Select all columns from the `new_products` table
//            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
//            ->whereIn('pr.category_id', $request->categoryCheckedValues)
//            ->whereBetween('pr.price', [$request->range_min, $request->range_max])
//            ->get(15);


        $productsQuery = DB::table('new_products as pr')
            ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')
            ->leftJoin('product_configuration as pc', 'pc.product_item_id', '=', 'pr.id')
            ->leftJoin('product_variation_options as pvo', 'pvo.id', '=', 'pc.variation_option_id')
            ->whereBetween('pr.price', [$request["range_min"], $request["range_max"]])
            ->select('pr.*', 'pi.product_images')
        ->distinct('pr.id');


        if (!empty($request["categoryCheckedValues"])) {
            $productsQuery->whereIn('pr.category_id', $request["categoryCheckedValues"]);
        }

        if (!empty($request["variationCheckboxValues"])) {
            $productsQuery->whereIn('pvo.variation_id', $request["variationCheckboxValues"]);
        }
        if (!empty($request["variationColorCheckboxesValues"])) {
            $productsQuery->orwhereIn('pvo.variation_id', $request["variationColorCheckboxesValues"]);
        }

        $products = $productsQuery->get();
        $html = '';

        foreach ($products as $item) {
            $images = json_decode($item->product_images);

            $imageUrl1 = asset('product_images/'.$images[0]);
            $imageUrl2 = asset('product_images/'.$images[1]);
            $productUrl = route('product.details', $item->id);
            $html .= <<<HTML
<div class="col-md-4">
    <div class="product-box mb-40">
        <div class="product-box-wrapper">
            <div class="product-img">
                <img src="{$imageUrl1}" class="w-100" alt="">
                <a href="$productUrl" class="d-block">
                    <div class="second-img">
                        <img src="{$imageUrl2}" alt="" class="w-100">
                    </div>
                </a>
                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                    view</a>
            </div>
            <div class="product-desc pb-20">
                <div class="product-desc-top">
                    <div class="categories">
                        <a href="shop2.html" class="product-category"><span>Woman</span></a>
                    </div>
                    <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                </div>
                <a href="single-product-4.html" class="product-title">Light green crewnec...</a>
                <div class="price-switcher">
                    <span class="price switcher-item">$$item->price</span>
                    <a href="cart.html" class="add-cart text-capitalize switcher-item">+add
                        to cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
HTML;
        }


//        echo $html;


//        dd($html);

        return $html;

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

    public function addToCartWithCustomization(Request $request) {
//        dd($request);

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

            $insertedCartItemId = DB::table('shopping_cart_items')->insertGetId([
                'cart_id' => $insertedId,
                'product_item_id' => $request->product_item_id,
                'qty' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $productCustomization = DB::table('shopping_cart_details')->insertGetId([
                'cart_id' => $insertedId,
                'cart_item_id' => $insertedCartItemId,
                'collar_name' => $request->collar_name,
                'collar_url' => $request->collar_url,
                'pocket_name' => $request->pocket_name,
                'pocket_url' => $request->pocket_url,
                'placket_name' => $request->placket_name,
                'placket_url' => $request->placket_url,
                'buttons_name' => $request->buttons_name,
                'buttons_url' => $request->buttons_url,
                'sleeves_name' => $request->sleeves_name,
                'sleeves_url' => $request->sleeves_url,
                'cuff_name' => $request->cuff_name,
                'cuff_url' => $request->cuff_url,
                'back_name' => $request->back_name,
                'back_url' => $request->back_url,
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
//dd($request);

        $user = \Illuminate\Support\Facades\Auth::user();
//        dd($user);
        if ($user === null ){
            return redirect()->route('user.login.index');
        }else {
            $user_id = $user->id;
        }

        $cart_items = DB::table('shopping_cart')
            ->leftJoin('shopping_cart_items', 'shopping_cart_items.cart_id', '=', 'shopping_cart.id')
            ->leftJoin('new_products', 'new_products.id', '=', 'shopping_cart_items.product_item_id')
            ->select('shopping_cart.*', 'new_products.id as np_id', 'new_products.product_name', 'new_products.price', 'shopping_cart_items.id as sci_id','shopping_cart_items.cart_id', 'shopping_cart_items.product_item_id', 'shopping_cart_items.qty')
            ->where('shopping_cart.user_id', '=', $user_id)
            ->get();

//                dd($cart_items);
        $sum = 0;
        foreach ($cart_items as $key=>$cart_item) {
            $sum += $cart_item->qty * $cart_item->price;
        }
//        dd($sum);

        $insertedId = DB::table('shop_order_new')->insertGetId([
            'user_id' => $user_id,
            'products' => '',
            'total_price' => $sum,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'city' => $request->city,
            'postal_code' => $request->postal_code,
            'permanent_address' => $request->permanent_address,
            'shipping_address' => $request->shipping_address,
            'shipping_type' => '-',
            'order_status' => 'ordered',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        foreach ($cart_items as $item) {
            $cart_item_details = DB::table('shopping_cart_details')
                ->where('cart_id', '=', $item->cart_id)
                ->first();
//            dd($cart_item_details);
          $insertedProductId =  DB::table('shop_order_products')->insertGetId([
                'order_id' => $insertedId,
                'product_id' => $item->np_id,
                'qty' => $item->qty,
                'created_at' => Carbon::now(),
            ]);
            $productCustomization = DB::table('shop_order_details')->insertGetId([
                'order_id' => $insertedId,
                'order_product_id' => $item->np_id,
                'collar_name' => $cart_item_details->collar_name,
                'collar_url' => $cart_item_details->collar_url,
                'pocket_name' => $cart_item_details->pocket_name,
                'pocket_url' => $cart_item_details->pocket_url,
                'placket_name' => $cart_item_details->placket_name,
                'placket_url' => $cart_item_details->placket_url,
                'buttons_name' => $cart_item_details->buttons_name,
                'buttons_url' => $cart_item_details->buttons_url,
                'sleeves_name' => $cart_item_details->sleeves_name,
                'sleeves_url' => $cart_item_details->sleeves_url,
                'cuff_name' => $cart_item_details->cuff_name,
                'cuff_url' => $cart_item_details->cuff_url,
                'back_name' => $cart_item_details->back_name,
                'back_url' => $cart_item_details->back_url,
            ]);
        }
//
//        $insertedId = DB::table('shop_order_new')->insertGetId([
//            'user_id' => $user_id,
//            'products' => $product,
//            'total_price' => $sum,
//            'name' => $request->name,
//            'email' => $request->email,
//            'phone' => $request->phone,
//            'country' => $request->country,
//            'city' => $request->city,
//            'postal_code' => $request->postal_code,
//            'permanent_address' => $request->permanent_address,
//            'shipping_address' => $request->shipping_address,
//            'shipping_type' => '-',
//            'order_status' => 'ordered',
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//        ]);
        //        dd($cart_id ,$product_id);
        DB::table('shopping_cart')
            ->where('user_id', '=', $user_id)
            ->delete();
        foreach ($cart_items as $key=>$cart_item) {
            DB::table('shopping_cart_items')
                ->where('cart_id', '=', $cart_item->cart_id)
                ->delete();
        }

        return redirect()->route('home.index');

    }

}
