<!-- header section start -->

@php

$products_categories = \Illuminate\Support\Facades\DB::table('product_category')->get();
$product_brands = \Illuminate\Support\Facades\DB::table('brands')->get();
$new_products = \Illuminate\Support\Facades\DB::table('new_products')->limit('6')->get();



$user = \Illuminate\Support\Facades\Auth::user();
$user_id= 0;
if (isset($user) && $user !== null) {
    $user_id = $user->id;
}

$cart_items = \Illuminate\Support\Facades\DB::table('shopping_cart as sc')
    ->leftJoin('shopping_cart_items as sci', 'sci.cart_id', '=', 'sc.id')
    ->leftJoin('new_products as np', 'np.id', '=', 'sci.product_item_id')
    ->leftJoin('product_images as pi', 'pi.product_id', '=', 'np.id')
    ->where('sc.user_id', '=', $user_id)
    ->get();
$whishlist_count = \Illuminate\Support\Facades\DB::table('my_whishlist')->where('user_id', '=', $user_id)->count();
@endphp


<header class="header bright-turquoise-content pt-4  header-sticky header-static">
    <div class="container-fluid">
        <div class="header-nav header-nav-2 position-relative">
            <div class="row align-items-center">


                <div class="col-xl-5 col-lg-6 hidden-md position-static">
                    <div class="header-nav">
                        <nav>
                            <ul>
                                <li><a href="{{route('home.index')}}" class="{{ (request()->is('home')) ? 'active' : '' }}"><span>Home</span></a>
                                </li>
                                <li class="position-static"><a href="{{route('shop.index')}}" class="{{ (request()->is('shop')) ? 'active' : '' }}"><span>Shop  <i class="fal fa-angle-down"></i></span></a>
                                    <div class="mega-menu">
{{--                                    <div class="mega-menu" style="background-image: url({{asset('frontend/img/Darzi_megamenu.png')}})">--}}
                                        <div class="col-xl-7 pl-0 position-static">
                                            <div class="row">
                                                <div class="col-md-6 text-center">
                                                    <img src="https://www.bombayshirts.com/cdn/shop/files/Artboard_1_25bc87ce-fc4e-4ece-bb57-fb4e7ede26ec.png?v=1696598412" alt="" style="width: 100%">
                                                    <br>
                                                    <a href="{{route('shop.index')}}" class="mt-2">Shirts</a>
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <img src="https://www.bombayshirts.com/cdn/shop/files/Artboard_1_25bc87ce-fc4e-4ece-bb57-fb4e7ede26ec.png?v=1696598412" alt="" style="width: 100%">
                                                    <br>
                                                    <a href="{{route('shop.index')}}" class="mt-2">Fabric</a>
                                                </div>
{{--                                                <div class="col-md-4"></div>--}}
                                            </div>
{{--                                            <ul style="padding-left: 10px">--}}
{{--                                                <h6>Product Categories</h6>--}}
{{--                                                @foreach($products_categories as $item)--}}
{{--                                                    <li><a href="{{route('shop.index')}}?category_id={{$item->id}}">{{$item->category_name}}</a></li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}

{{--                                            <ul style="padding-left: 10px">--}}
{{--                                                <h6>Product Brands</h6>--}}
{{--                                                @foreach($product_brands as $item)--}}
{{--                                                <li><a href="{{route('shop.index')}}?brand_id={{$item->id}}">{{$item->brand_name}}</a></li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
{{--                                            <ul style="padding-left: 10px">--}}
{{--                                                <h6>New Products</h6>--}}
{{--                                                @foreach($new_products as $item)--}}
{{--                                                <li><a href="{{route('product.details', $item->id)}}">{{$item->product_name}}</a></li>--}}
{{--                                                @endforeach--}}
{{--                                            </ul>--}}
                                        </div>
                                    </div>
                                </li>
{{--                                <li><a href="#"><span>Blog </span> </a>--}}

                                </li>
                                <li><a class="{{ (request()->is('about-us')) ? 'active' : '' }}" href="{{ route('home.about') }}"><span>About</span></a></li>
                                <li><a class="{{ (request()->is('contact-us')) ? 'active' : '' }}" href="{{ route('home.contact') }}"><span>Contact</span></a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-3">
                    <div class="logo ">
                        <a href="{{route('home.index')}}"><img src="{{asset('frontend/img/logo/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 col-6 col-md-6 col-sm-6 col-9">
                    <div class="header-right">
                        <ul class="text-right">
                            @php

                            //$categories = \Illuminate\Support\Facades\DB::table('product_category')->limit(5)->get();
                            //dd($categories);

                            if (Auth::user() === null) {
                            @endphp
                                <li><a style="{{ (request()->is('login/user')) ? 'color:#c89419!important ': '' }}" href="{{route('user.login.index')}}" class="account"><i class="fal fa-user-friends"></i> <article class="account-registar d-inline-block">Login/Sign up</article></a></li>
                            <li><a href="javascript:void(0)"><i class="fal fa-search"></i></a>

                                <!-- search popup -->
                                <div id="search-popup">
                                    <div class="close-search-popup">
                                        <i class="fal fa-times"></i>
                                    </div>
                                    <div class="search-popup-inner mt-60">
                                        <div class="search-title text-center">
                                            <h2>Search</h2>
                                        </div>

                                        <div class="search-content pt-55">
                                            <ul class="text-center">
                                                <li><a href="javascript:void(0)" class="active">All categories</a></li>
                                                @foreach($products_categories as $item)
                                                    <li><a href="{{route('shop.index')}}?category_id={{$item->id}}">{{$item->category_name}}</a></li>
                                                @endforeach
{{--                                                <li><a href="javascript:void(0)">Clothing</a></li>--}}
{{--                                                <li><a href="javascript:void(0)">Gift Cards</a></li>--}}
{{--                                                <li><a href="javascript:void(0)">Handbag</a></li>--}}
{{--                                                <li><a href="javascript:void(0)">Kids</a></li>--}}
{{--                                                <li><a href="javascript:void(0)">Shoes</a></li>--}}
{{--                                                <li><a href="javascript:void(0)">Sneaker</a></li>--}}
{{--                                                <li><a  href="javascript:void(0)">Women</a></li>--}}
                                            </ul>

                                            <div class="search-form mt-35">
                                                <form action="#" method="post">
                                                    <input type="text" placeholder="Search Products..." name="search" oninput="searchProdcut(this.value)">
                                                    <button type="submit"><i class="fal fa-search"></i></button>
                                                </form>
                                            </div>

                                            <div class="search-result-list" id="search-result-list-div" >
                                                <ul class="text-left" id="search-result-list">
{{--                                                    <li class="d-block d-flex align-items-center">--}}
{{--                                                        <div class="search-result-img">--}}
{{--                                                            <img src="img/product/1.jpg" class="w-100" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="search-result-desc pl-10">--}}
{{--                                                            <a href="single-product-5.html" class="title px-0">ELLE  - Recliner syntheti chair</a>--}}
{{--                                                            <div class="price">$<span>399</span></div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="d-block d-flex align-items-center">--}}
{{--                                                        <div class="search-result-img">--}}
{{--                                                            <img src="img/product/2.jpg" class="w-100" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="search-result-desc pl-10">--}}
{{--                                                            <a href="single-product-5.html" class="title px-0">RIMINI  - Folding leather deck chair</a>--}}
{{--                                                            <div class="price">$<span>399</span></div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="d-block d-flex align-items-center">--}}
{{--                                                        <div class="search-result-img">--}}
{{--                                                            <img src="img/product/3.jpg" class="w-100" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="search-result-desc pl-10">--}}
{{--                                                            <a href="single-product-5.html" class="title px-0">LANDSCAPE  - Folding fabric deck chair</a>--}}
{{--                                                            <div class="price">$<span>399</span></div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="d-block d-flex align-items-center">--}}
{{--                                                        <div class="search-result-img">--}}
{{--                                                            <img src="img/product/1.jpg" class="w-100" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="search-result-desc pl-10">--}}
{{--                                                            <a href="single-product-5.html" class="title px-0">ELLE  - Recliner syntheti chair</a>--}}
{{--                                                            <div class="price">$<span>399</span></div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="d-block d-flex align-items-center">--}}
{{--                                                        <div class="search-result-img">--}}
{{--                                                            <img src="img/product/2.jpg" class="w-100" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="search-result-desc pl-10">--}}
{{--                                                            <a href="single-product-5.html" class="title px-0">RIMINI  - Folding leather deck chair</a>--}}
{{--                                                            <div class="price">$<span>399</span></div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="d-block d-flex align-items-center">--}}
{{--                                                        <div class="search-result-img">--}}
{{--                                                            <img src="img/product/3.jpg" class="w-100" alt="">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="search-result-desc pl-10">--}}
{{--                                                            <a href="single-product-5.html" class="title px-0">LANDSCAPE  - Folding fabric deck chair</a>--}}
{{--                                                            <div class="price">$<span>399</span></div>--}}
{{--                                                        </div>--}}
{{--                                                    </li>--}}
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </li>
                            <li><a href="{{route('user.login.index')}}">
                                    <i class="fal fa-shopping-bag"><span></span></i></a>
                            </li>
                            <li>
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=923360018111" class="" title="Whatsapp">
                                    <img src="https://cdn.shopify.com/s/files/1/0536/3594/0515/files/whatsapp.png?v=1670330459" style="width: 20px;"></a>
                            </li>
                            <li style="font-size: 14px;
    border-left: 1px solid black;
    height: 20px;"><a style="font-size: 14px;{{ (request()->is('talk-to-darrzi')) ? 'color:#c89419!important ': '' }}" href="{{ route('taktoDarrzi') }}" class=""><i class="fal fa-headphones"></i>Talk To Darrzi</a>

</li>
{{--                            <li><a href="javascript:void(0)"><i class="fal fa-align-right"></i></a>--}}
{{--                                <ul class="submenu bold-content text-right">--}}
{{--                                    <li><a href="registar.html">My Account</a></li>--}}
{{--                                    <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                    <li><a href="shop.html">Shop</a></li>--}}
{{--                                    <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                                    <li><a href="question.html">Frequently</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                            @php
                                }
                            @endphp

                            @php
                                if (Auth::user() !== null) {
                            @endphp
                            <li><a href="javascript:void(0)"><i class="fal fa-search"></i></a>

                                <!-- search popup -->
                                <div id="search-popup">
                                    <div class="close-search-popup">
                                        <i class="fal fa-times"></i>
                                    </div>
                                    <div class="search-popup-inner mt-60">
                                        <div class="search-title text-center">
                                            <h2>Search</h2>
                                        </div>

                                        <div class="search-content pt-55">
                                            <ul class="text-center">
                                                <li><a href="javascript:void(0)" class="active">All categories</a></li>
                                                @foreach($products_categories as $item)
                                                    <li><a href="{{route('shop.index')}}?category_id={{$item->id}}">{{$item->category_name}}</a></li>
                                                @endforeach
                                            </ul>

                                            <div class="search-form mt-35">
                                                <form action="#" method="post">
                                                    <input type="text" placeholder="Search Products..." name="search" oninput="searchProdcut(this.value)">
                                                    <button type="submit"><i class="fal fa-search"></i></button>
                                                </form>
                                            </div>

                                            <div class="search-result-list" id="search-result-list-div" >
                                                <ul class="text-left" id="search-result-list">

                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </li>

                            <li><a href="{{route('user.whishlist')}}" data-toggle="tooltip" data-placement="bottom" title="view wishlist"><i class="fal fa-heart"><span>{{$whishlist_count}}</span></i></a></li>
                            <li><a href="{{route('my.cart.items')}}"><i class="fal fa-shopping-bag"><span>{{count($cart_items)}}</span></i></a>
                            </li>
                            <li>
                                <a href="#" class="" title="Whatsapp">
                                    <img src="https://cdn.shopify.com/s/files/1/0536/3594/0515/files/whatsapp.png?v=1670330459" style="width: 20px;"></a>
                            </li>
                            <li style="font-size: 14px;
    border-left: 1px solid black;
    height: 20px;"><a style="font-size: 14px;{{ (request()->is('talk/to/darrzi')) ? 'color:#c89419!important ': '' }}" href="{{ route('taktoDarrzi') }}" class=""><i class="fal fa-headphones"></i>Talk To Darrzi</a>
                            <li><a href="javascript:void(0)"><i class="fal fa-align-right"></i></a>
                                <ul class="submenu bold-content text-right">
                                    <li><a href="{{route('user.profile')}}">My Account</a></li>
                                    <li><a href="{{route('my.cart.items')}}">My Cart</a></li>
{{--                                    <li><a href="checkout.html">Checkout</a></li>--}}
                                    <li><a href="{{route('shop.index')}}">Shop</a></li>
                                    <li><a href="{{route('logout')}}">Logout</a></li>
{{--                                    <li><a href="wishlist.html">Wishlist</a></li>--}}
{{--                                    <li><a href="question.html">Frequently</a></li>--}}
                                </ul>
                            </li>
                            @php
                                }
                            @endphp


                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu visible-sm">
            <div id="mobile-menu">
                <ul>
                    <li><a  class="pl-3" href="javascript:void(0)">Home</a>
                        <ul class="pl-4">
                            <li><a href="index.html">Home Fashion 1</a></li>
                            <li><a href="index2.html">Home Fashion 2</a></li>
                            <li><a href="index3.html">Home Fashion 3</a></li>
                            <li><a href="index4.html">Home Fashion 4</a></li>
                            <li><a href="index5.html">Home Fashion 5</a></li>
                            <li><a href="index6.html">Home Fashion 6</a></li>
                            <li><a href="index7.html">Home Fashion 7</a></li>

                        </ul>
                    </li>
                    <li><a  class="pl-3" href="javascript:void(0)">Shop</a>
                        <ul>
                            <li><a href="shop.html">Shop Layout</a></li>
                            <li><a href="shop4.html">Masonry – Grid</a></li>
                            <li><a href="shop3.html">Pagination</a></li>
                            <li><a href="shop2.html">Ajax Load More</a></li>
                            <li><a href="shop2.html">Infinite Scroll</a></li>
                            <li><a href="shop2.html">Sidebar Right</a></li>
                            <li><a href="shop.html">Sidebar Left</a></li>
                            <li><a href="shop.html">Shop Pages</a></li>
                            <li><a href="shop2.html">List View</a></li>
                            <li><a href="shop3.html">Small Products</a></li>
                            <li><a href="shop2.html">Large Products</a></li>
                            <li><a href="shop3.html">Shop — 3 Items</a></li>
                            <li><a href="shop3.html">Shop — 4 Items</a></li>
                            <li><a href="shop4.html">Shop — 5 Items</a></li>
                            <li><a href="single-product-5.html">Product Layout</a></li>
                            <li><a href="single-product.html">Description Sticky</a></li>
                            <li><a href="single-product-5.html">Product Carousels</a></li>
                            <li><a href="single-product-3.html">Gallery Modern</a></li>
                            <li><a href="single-product-4.html">Thumbnail Left</a></li>
                            <li><a href="single-product-5.html">Thumbnail Right</a></li>
                            <li><a href="single-product-5.html">Thumbnail Botttom</a></li>
                        </ul>
                    </li>
{{--                    <li><a href="javascript:void(0)">Blog</a>--}}
{{--                        <ul>--}}
{{--                            <li><a href="blog.html">Grid layout</a></li>--}}
{{--                            <li><a href="blog2.html">Large image</a></li>--}}
{{--                            <li><a href="blog3.html">Left Sidebar</a></li>--}}
{{--                            <li><a href="blog4.html">Right Sidebar</a></li>--}}
{{--                            <li><a href="blog5.html">No sidebar</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li><a href="javascript:void(0)">Portfolio</a>
                        <ul>
                            <li><a href="portfolio.html">Single project</a></li>
                            <li><a href="portfolio2.html">Two Columns</a></li>
                            <li><a href="portfolio3.html">Three Columns</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
        <!-- /. mobile nav -->
    </div>
</header>
<!-- Calendly badge widget begin -->
<!-- Calendly badge widget begin -->
<!-- Calendly badge widget begin -->
<!-- Calendly link widget begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
{{-- <a href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/d/z7y-m74-csb/customer-follow-up'});return false;">Talk To Darrzi</a> --}}
<!-- Calendly link widget end -->
<!-- Calendly badge widget end -->
<!-- Calendly badge widget end -->
<!-- Calendly badge widget end -->
<!-- header section end -->
