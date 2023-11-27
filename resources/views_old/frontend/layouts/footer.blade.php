<!-- footer section start -->
@php
    $product_categories = \Illuminate\Support\Facades\DB::table('product_category')->get();
    $brands = \Illuminate\Support\Facades\DB::table('brands')->get();
    //  dd($brands)
@endphp
<section class="footer">


    <div class="footer-bottom pt-77" style="background-color: #292929;">
        <div class="container-1180">
            <div class="footer-bottom-wrapper">
                <div class="footer-bottom-primary pb-60">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-9">
                            <div class="footer-item has-desc">
                                <div class="footer-logo mb-25">
                                    <img src="{{asset('frontend/img/logo/logo.png')}}" class="w-25" style="height: auto" height="31" alt="">
                                </div>
                                <div class="footer-desc">
                                    <p class="mb-10">Darzi store is a premium theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready.</p>
                                </div>
                                <div class="footer-img mt-65">
                                    <img src="{{asset('frontend/img/logo/paypal.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6">
                                    <div class="footer-menu">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="title">MY ACCOUNT</a></li>
                                            <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                            <li><a href="{{ route('user.view.address') }}">My Address</a></li>
                                            <li><a href="{{ route('mySize') }}">My Sizes</a></li>
                                            <li><a href="{{ route('user.whishlist') }}">Wishlist</a></li>
                                            <li><a href="{{ route('my.orders') }}">My Orders</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6">
                                    <div class="footer-menu">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="title">Our Categories</a></li>
                                            @foreach($product_categories as $key=>$item)
                                                <li><a href="{{route('shop.index')}}?category_id={{$item->id}}">{{$item->category_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 hidden-sm">
                                    <div class="footer-menu">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="title">Our Brands</a></li>
                                            @foreach($brands as $key=>$item)
                                                <li><a href="{{route('shop.index')}}?brand_id={{$item->id}}">{{$item->brand_name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- footer section end -->
