<?php

namespace App\Http\Controllers\shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Order;

class ShopController extends Controller
{
    public function index() {

        $orders = DB::table('shop_order_new')->paginate(5);
        // dd($orders);

        return view('shop.index', ['data'=> $orders]);
    }

    public function edit($id) {


        $order = DB::table('shop_order_new')
        ->where('id', '=', $id)
        ->first();
// dd($order);
        $orderProducts = DB::table('shop_order_products')
        ->leftjoin('new_products', 'new_products.id', '=', 'shop_order_products.product_id')
        ->select('shop_order_products.*', 'new_products.id as np_id', 'new_products.price', 'new_products.product_name')
        ->where('order_id', '=', $id)
        ->get();
        $sizing_details = DB::table('user_sizes')->where('id', '=', $order->size_id)->first();

//         dd($sizing_details);
        return view('shop.update', ['order'=> $order,'orderProducts'=> $orderProducts, 'sizing_details' => $sizing_details]);

    }

    public function update(Request $request, $id) {
        $user_email = Auth::user()->email;
//        dd($user_email, $request);
        // dd($request);
        $insertedId = DB::table('shop_order_new')
        ->where('id', '=', $id)
        ->update([
        'order_status' => $request->order_status,
    ]);
        $status = $request->order_status;
    $mailData = [
        'title' => 'Mail Darrzi',
        'body' => 'Your Order has been .'.$request->order_status
    ];

    Mail::to($user_email)->send(new Order($mailData,$status));

    return redirect()->route('shop.order.index');
    }
}
