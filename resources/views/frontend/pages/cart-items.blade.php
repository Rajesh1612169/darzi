@extends('frontend.layouts.app')
@section('content')
    {{--{{dd($categories)}}--}}
    <!-- banner-1 section start -->
    <!-- shop body section start -->
    <section class="cart-body mb-90 gray-border-top pt-35">
        <div class="has-breadcrumb-content">
            <div class="container container-1430">
                <div class="breadcrumb-content" style="flex-direction: column;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                    <h2 class="cart-title mt-40">Cart</h2>
                </div>

                <div class="cart-body-content">
                    <div class="row">
                        <div class="col-xl-8">

                            <div class="product-content">
                                <form action="#">
                                    <div class="table-responsive">
                                        <table class="table table-2">
                                            <thead>
                                            <tr>
                                                <th class="remove-porduct"></th>
                                                <th class="product-image"></th>
                                                <th class="product-title">Product</th>
                                                <th>Price</th>
                                                <th class="quantity">Quantity</th>
                                                <th class="total">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                             $sum = 0;
                                            @endphp
                                                @foreach($cart_items as $item)
                                                @php

                                                $total = $item->qty * $item->price;
                                                $sum += $total;
                                                //dd($item);
                                                    $images = json_decode($item->product_images);
                                                    //dd($images[0]);
                                                @endphp
                                            <tr>
                                                <td>
                                                    <div class="table-data">
{{--                                                        <form action="{{route('delete.cart.item')}}" method="POST">--}}
{{--                                                            @csrf--}}
{{--                                                            <input type="hidden" name="product_item_id" value="{{$item->product_item_id}}">--}}
{{--                                                            <input type="hidden" name="cart_id" value="{{$item->cart_id}}">--}}
{{--                                                            <button type="submit" class="close-btn"><i class="fal fa-times"></i></button>--}}
{{--                                                        </form>--}}
                                                        <a href="{{route('delete.cart.item', ['cart_id' => $item->cart_id, 'product_id' => $item->product_item_id])}}" class="close-btn"><i class="fal fa-times"></i></a>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data">
                                                        <img src="{{asset('product_images/'.$images[0])}}" width="80" alt="">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data">
                                                        <h6><a href="single-product-3.html" class="title">{{$item->product_name}}</a></h6>
                                                    </div>
                                                    <div class="table-data">
                                                        <p><a href="single-product-3.html" class="title">{{$item->short_description}}</a></p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-  data">
                                                        <span class="price">${{$item->price}}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data">
                                                        <input type="number" min="1" id="qty" onchange="changeTotal(this.value, `{{$item->cart_id}}`, `{{$item->product_item_id}}`)" value="{{$item->qty}}" style="margin-right: 20px; width: 119px;">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table-data">
                                                        <span class="total">${{$item->price * $item->qty}}</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
{{--                                    <div class="cupon">--}}
{{--                                        <form action="#" method="POST">--}}
{{--                                            <input type="text" placeholder="Cupon code" class="text-left pl-3" style="margin-right: 20px; width: 119px;">--}}
{{--                                            <button class="generic-btn border-0 red-hover-btn text-uppercase">Apply Cupon</button>--}}
{{--                                            <button class="generic-btn border-0 red-hover-btn text-uppercase float-right">Update Cart</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="cart-widget">
                                <h4 class="title">Cart Totals</h4>
                                <table class="table table-2 no-border">
                                    <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>${{$sum}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>
                                            <h6>Flat rate</h6>
                                            <p>Shipping options will be updated during checkout.</p>
                                            <a href="javascript:void(0)" class="price-calculate">Calculate shipping</a>
                                            <div class="calculate-shipping-box">
                                                <form action="#" method="POST">
                                                    <div class="form-group">
                                                        <div class="cart-select">
                                                            <select name="country" id="country">
                                                                <option value="uk">United Kingdom</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Country">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Town / City">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="number" placeholder="Post Code">
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="generic-btn border-0 red-hover-btn text-uppercase ">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td><strong>${{$sum}}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a href="{{route('create.new.order')}}" class="mt-40 generic-btn red-hover-btn w-100 d-block" style="height: 50px;">Proceed to checkout</a>
                            </div>
                            <!-- /. cart widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop body section end -->

    <div class="footer-top mt-120 pb-120 pt-115" style="background-color: #f5f5f5;">
        <div class="footer-top-wrapper">
            <div class="newsletter ">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <h2 class="title m-0">Sign Up For Our Newsletter</h2>
                        <p>Subscribe our newsletter and get discount 20% Off</p>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="newsletter-form">
                            <form action="#" method="POST">
                                <input type="text" placeholder="Search for our newsletter...">
                                <button type="submit"
                                        class="generic-btn red-hover-btn text-uppercase float-right">Subscribe
                                    Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.newsletter -->
            <div class="service pt-57 mt-40 gray-border-top">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-md-6 service-item">
                        <div class="service-box service-box-2">
                            <div class="service-box-content">
                                <h4 class="title">Worldwide Shipping</h4>
                                <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                    molestie consequat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-6 service-item">
                        <div class="service-box service-box-2">
                            <div class="service-box-content">
                                <h4 class="title">Online Support 24/7</h4>
                                <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                    molestie consequat.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 hidden-md service-item">
                        <div class="service-box service-box-2">
                            <div class="service-box-content">
                                <h4 class="title">Money Return Guarantee</h4>
                                <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                    molestie consequat.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. service -->
            <!-- /. footer bottom -->
        </div>

    </div>

    <script>

    </script>
@endsection
