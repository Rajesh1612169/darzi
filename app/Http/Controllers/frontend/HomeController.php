<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            ->get();
        return view('frontend.pages.shop', ['products'=>$products]);

    }
}
