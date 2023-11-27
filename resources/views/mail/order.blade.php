<!DOCTYPE html>
<html>
<head>
    <title>Darrzi.com</title>
</head>
<body>
@php
$user_id = \Illuminate\Support\Facades\Auth::user()->id;
$order_status = \Illuminate\Support\Facades\DB::table('shop_order_new')->where('user_id', '=', $user_id)->first();
@endphp
    <h1>Your Order Status</h1>
    <p>Your order has been {{$order_status->order_status}}</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <p>Thank you</p>
</body>
</html>
