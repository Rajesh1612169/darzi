<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index() {

        $currentMonth = Carbon::now()->month; // Get the current month
        $currentYear = Carbon::now()->year; // Get the current year


        $total_products = DB::table('new_products')->count();
        $total_categories = DB::table('product_category')->count();
        $total_brands = DB::table('brands')->count();
        // $total_brands = DB::table('brands')->count();
        $total_users = DB::table('users')->count();
        // $total_sales_this_month = DB::table('shop_order_new')->count();

        $totalOrdersThisMonth = DB::table('shop_order_new')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->count();
            $totalCompletedOrdersThisMonth = DB::table('shop_order_new')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('order_status', '=', 'completed')
            ->count();
            $totalRevenueThisMonth = DB::table('shop_order_new')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->where('order_status', '=', 'completed')
            ->get();
            $sumRevenue = 0;
            foreach($totalRevenueThisMonth as $item) {
                $sumRevenue += $item->total_price;
            }

            $currentDate = Carbon::now()->format('Y-m-d'); // Get the current date

            $todayOrders = DB::table('shop_order_new')
            ->whereDate('created_at', $currentDate)
            // ->where('order_status', 'completed')
            ->get();
        // dd($todayOrders);

        return view('welcome', [
            'total_products' =>$total_products,
            'total_categories' =>$total_categories,
            'total_brands' =>$total_brands,
            'total_users' =>$total_users,
            'totalOrdersThisMonth' =>$totalOrdersThisMonth,
            'sumRevenue' =>$sumRevenue,
            'totalCompletedOrdersThisMonth' =>$totalCompletedOrdersThisMonth,
            'todayOrders' =>$todayOrders,

        ]);
    }


}
