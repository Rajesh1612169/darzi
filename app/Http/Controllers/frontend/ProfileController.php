<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {
//        $categories = DB::table('product_category')->get();
//        return view('frontend.pages.home', ['categories' => $categories]);
        return view('frontend.pages.my-account');
    }
}
