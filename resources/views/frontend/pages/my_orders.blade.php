@extends('frontend.layouts.app')
@section('content')
    <div class="row m-3 mt-5">
        <div class="col-md-3">
            @include('frontend.components.sidebar')
        </div>
        <div class="col-md-9">
            <h4>My Orders</h4>
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="product-thumbnail">Order ID</th>
                        <th class="product-thumbnail">Order Date</th>
                        <th class="cart-product-name">Product * qty</th>
                        <th class="product-price">Total Price</th>
                        <th class="cart-product-name">Shipping Address</th>
                        <th class="cart-product-name">Order Status</th>
{{--                        <th class="product-remove">Action</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($my_orders as $item)
{{--                        @php--}}
{{--                            $my_order_products = DB::table('new_products as pr')--}}
{{--                               ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')--}}
{{--                               ->get();--}}

{{--                        @endphp--}}
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->total_price }}</td>
                            <td>{{ $item->shipping_address }}</td>
                            <td>{{ $item->order_status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="footer-top  pb-120 pt-115" style="background-color: #f5f5f5;margin-top: 100px">
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
                                <button type="submit" class="generic-btn red-hover-btn text-uppercase float-right">Subscribe
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

@endsection
