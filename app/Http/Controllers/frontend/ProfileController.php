<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {
//        $categories = DB::table('product_category')->get();
//        return view('frontend.pages.home', ['categories' => $categories]);

//        $user_id = Auth::user()->id;
        $categories = DB::table('product_category')->get();
        $user = \Illuminate\Support\Facades\Auth::user();
//        dd($user);
        if ($user === null ){
            return redirect()->route('user.login.index');
        }else {
            $user_id = $user->id;
        }

        $whishlist = DB::table('my_whishlist as mw')
            ->leftJoin('new_products as np', 'np.id', 'mw.product_id')
            ->leftJoin('product_images as pi', 'pi.product_id', 'np.id')
            ->select('mw.*', 'np.id as np_id','np.product_name', 'np.price', 'np.short_description', 'pi.id as pi_id', 'pi.product_images')
            ->where('user_id', '=', $user_id)
            ->get();

        $profile = DB::table('users')
            ->where('id', '=', $user_id)
            ->first();
//        dd($profile);
        return view('frontend.pages.my-account',['whishlist'=>$whishlist, 'profile' => $profile]);
    }

    public function profileUpdate(Request $request) {
//        dd($request);
        $user = \Illuminate\Support\Facades\Auth::user();
//        dd($user);
        if ($user === null ){
            return redirect()->route('user.login.index');
        }else {
            $user_id = $user->id;
        }
        $insertedId = DB::table('users')
            ->where('id', '=', $user_id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_no' => $request->phone_no,
                'address' => $request->address,
            ]);

        return redirect()->back();
    }

    public function addToWishList($user_id, $product_id) {
//        dd($user_id, $product_id);
        $user = \Illuminate\Support\Facades\Auth::user();
//        dd($user);
        if ($user === null ){
            return redirect()->route('user.login.index');
        }else {
            $user_id = $user->id;
        }

        $insertedId = DB::table('my_whishlist')->insertGetId([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }

    public function deleteWhishlist($id,$product_id) {
        $user_id = Auth::user()->id;
//        dd($cart_id ,$product_id);
        DB::table('my_whishlist')
            ->where('id', '=', $id)
            ->where('user_id', '=', $user_id)
            ->where('product_id', '=', $product_id)
            ->delete();
        return redirect()->back();
    }
}
