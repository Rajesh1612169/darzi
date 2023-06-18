@extends('frontend.layouts.app')
@section('content')


    <!-- shop body section start -->
    <main>

        <!-- breadcrumb-area-start -->
        <section class="breadcrumb-area" data-background="img/bg/page-title.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content" style="flex-direction: column;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Cart</li>
                                </ol>
                            </nav>
                            <h2 class="cart-title mt-40">Create New Order</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

{{--        <!-- coupon-area start -->--}}
{{--        <section class="coupon-area pt-30 pb-30">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="coupon-accordion">--}}
{{--                            <!-- ACCORDION START -->--}}
{{--                            <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>--}}
{{--                            <div id="checkout-login" class="coupon-content">--}}
{{--                                <div class="coupon-info">--}}
{{--                                    <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est--}}
{{--                                        sit amet ipsum luctus.</p>--}}
{{--                                    <form action="#">--}}
{{--                                        <p class="form-row-first">--}}
{{--                                            <label>Username or email <span class="required">*</span></label>--}}
{{--                                            <input type="text" />--}}
{{--                                        </p>--}}
{{--                                        <p class="form-row-last">--}}
{{--                                            <label>Password <span class="required">*</span></label>--}}
{{--                                            <input type="text" />--}}
{{--                                        </p>--}}
{{--                                        <p class="form-row">--}}
{{--                                            <button class="btn theme-btn" type="submit">Login</button>--}}
{{--                                            <label>--}}
{{--                                                <input type="checkbox" />--}}
{{--                                                Remember me--}}
{{--                                            </label>--}}
{{--                                        </p>--}}
{{--                                        <p class="lost-password">--}}
{{--                                            <a href="javascript:void(0)">Lost your password?</a>--}}
{{--                                        </p>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- ACCORDION END -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="coupon-accordion">--}}
{{--                            <!-- ACCORDION START -->--}}
{{--                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>--}}
{{--                            <div id="checkout_coupon" class="coupon-checkout-content">--}}
{{--                                <div class="coupon-info">--}}
{{--                                    <form action="#">--}}
{{--                                        <p class="checkout-coupon">--}}
{{--                                            <input type="text" placeholder="Coupon Code" />--}}
{{--                                            <button class="btn theme-btn" type="submit">Apply Coupon</button>--}}
{{--                                        </p>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- ACCORDION END -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--        <!-- coupon-area end -->--}}
        <!-- checkout-area start -->
        <section class="checkout-area pb-70">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Full Name <span class="required">*</span></label>
                                            <input type="text" name="name" value="{{$profile->name}}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Email Address <span class="required">*</span></label>
                                            <input type="email" name="email" value="{{$profile->email}}" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" name="phone" value="{{$profile->phone_no}}" placeholder="Postcode / Zip" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="country-select">
                                            <label>Country <span class="required">*</span></label>
                                            <select name="country">
                                                <option value="Pakistan">Pakistan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="country-select">
                                            <label>City <span class="required">*</span></label>
                                            <select name="city">
                                                <option value="Karachi">Karachi</option>
                                                <option value="Islamabad">Islamabad</option>
                                                <option value="Lahore">Lahore</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip <span class="required">*</span></label>
                                            <input type="text" name="postal_code" placeholder="Postcode / Zip" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Permanent Address <span class="required">*</span></label>
                                            <input type="text" name="permanent_address" value="{{$profile->address}}" placeholder="Street address" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Shipping Address <span class="required">*</span></label>
                                            <input type="text" name="shipping_address" placeholder="Street address" />
                                        </div>
                                    </div>

{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="checkout-form-list create-acc">--}}
{{--                                            <input id="cbox" type="checkbox" />--}}
{{--                                            <label>Create an account?</label>--}}
{{--                                        </div>--}}
{{--                                        <div id="cbox_info" class="checkout-form-list create-account">--}}
{{--                                            <p>Create an account by entering the information below. If you are a returning--}}
{{--                                                customer please login at the top of the page.</p>--}}
{{--                                            <label>Account password <span class="required">*</span></label>--}}
{{--                                            <input type="password" placeholder="password" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
{{--                                <div class="different-address">--}}
{{--                                    <div class="ship-different-title">--}}
{{--                                        <h3>--}}
{{--                                            <label>Ship to a different address?</label>--}}
{{--                                            <input id="ship-box" type="checkbox" />--}}
{{--                                        </h3>--}}
{{--                                    </div>--}}
{{--                                    <div id="ship-box-info">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="country-select">--}}
{{--                                                    <label>Country <span class="required">*</span></label>--}}
{{--                                                    <select>--}}
{{--                                                        <option value="volvo">bangladesh</option>--}}
{{--                                                        <option value="saab">Algeria</option>--}}
{{--                                                        <option value="mercedes">Afghanistan</option>--}}
{{--                                                        <option value="audi">Ghana</option>--}}
{{--                                                        <option value="audi2">Albania</option>--}}
{{--                                                        <option value="audi3">Bahrain</option>--}}
{{--                                                        <option value="audi4">Colombia</option>--}}
{{--                                                        <option value="audi5">Dominican Republic</option>--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>First Name <span class="required">*</span></label>--}}
{{--                                                    <input type="text" placeholder="" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>Last Name <span class="required">*</span></label>--}}
{{--                                                    <input type="text" placeholder="" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>Company Name</label>--}}
{{--                                                    <input type="text" placeholder="" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>Address <span class="required">*</span></label>--}}
{{--                                                    <input type="text" placeholder="Street address" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-12">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>Town / City <span class="required">*</span></label>--}}
{{--                                                    <input type="text" placeholder="Town / City" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>State / County <span class="required">*</span></label>--}}
{{--                                                    <input type="text" placeholder="" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>Postcode / Zip <span class="required">*</span></label>--}}
{{--                                                    <input type="text" placeholder="Postcode / Zip" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>Email Address <span class="required">*</span></label>--}}
{{--                                                    <input type="email" placeholder="" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="checkout-form-list">--}}
{{--                                                    <label>Phone <span class="required">*</span></label>--}}
{{--                                                    <input type="text" placeholder="Postcode / Zip" />--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="order-notes">--}}
{{--                                        <div class="checkout-form-list">--}}
{{--                                            <label>Order Notes</label>--}}
{{--                                            <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="product-content">
                                        <form action="#">
                                            <div class="table-responsive">
                                                <table class="table table-2">
                                                    <thead>
                                                    <tr>
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
                                                                <div class="table-data">
                                                                    <span class="price">${{$item->price}}</span>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="table-data">
                                                                    <input type="number" disabled min="1" id="qty" onchange="changeTotal(this.value, `{{$item->cart_id}}`, `{{$item->product_item_id}}`)" value="{{$item->qty}}" style="margin-right: 20px; width: 119px;">
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

                            </div>
                            <div class="your-order mb-30 ">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
{{--                                    <table>--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="product-name">Product</th>--}}
{{--                                            <th class="product-total">Total</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr class="cart_item">--}}
{{--                                            <td class="product-name">--}}
{{--                                                Vestibulum suscipit <strong class="product-quantity"> × 1</strong>--}}
{{--                                            </td>--}}
{{--                                            <td class="product-total">--}}
{{--                                                <span class="amount">$165.00</span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="cart_item">--}}
{{--                                            <td class="product-name">--}}
{{--                                                Vestibulum dictum magna <strong class="product-quantity"> × 1</strong>--}}
{{--                                            </td>--}}
{{--                                            <td class="product-total">--}}
{{--                                                <span class="amount">$50.00</span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                        <tfoot>--}}
{{--                                        <tr class="cart-subtotal">--}}
{{--                                            <th>Cart Subtotal</th>--}}
{{--                                            <td><span class="amount">$215.00</span></td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="shipping">--}}
{{--                                            <th>Shipping</th>--}}
{{--                                            <td>--}}
{{--                                                <ul>--}}
{{--                                                    <li>--}}
{{--                                                        <input type="radio" />--}}
{{--                                                        <label>--}}
{{--                                                            Flat Rate: <span class="amount">$7.00</span>--}}
{{--                                                        </label>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <input type="radio" />--}}
{{--                                                        <label>Free Shipping:</label>--}}
{{--                                                    </li>--}}
{{--                                                    <li></li>--}}
{{--                                                </ul>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="order-total">--}}
{{--                                            <th>Order Total</th>--}}
{{--                                            <td><strong><span class="amount">$215.00</span></strong>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tfoot>--}}
{{--                                    </table>--}}
                                </div>

                                <div class="payment-method">
                                    <strong><span class="amount">Total:  ${{$sum}}</span></strong>
                                    <div class="accordion mt-4" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn-link" type="button" data-toggle="collapse" data-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                        Direct Bank Transfer
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                                 data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Make your payment directly into our bank account. Please use your Order ID
                                                    as the payment
                                                    reference. Your order won’t be
                                                    shipped until the funds have cleared in our account.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" type="button" data-toggle="collapse"
                                                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Cheque Payment
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Please send your cheque to Store Name, Store Street, Store Town, Store
                                                    State / County, Store
                                                    Postcode.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" type="button" data-toggle="collapse"
                                                            data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        PayPal
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    Pay via PayPal; you can pay with your credit card if you don’t have a
                                                    PayPal account.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment mt-20">
                                        <button type="submit" class="btn theme-btn">Place order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- checkout-area end -->


    </main>

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
    <!-- footer top -->
@endsection
