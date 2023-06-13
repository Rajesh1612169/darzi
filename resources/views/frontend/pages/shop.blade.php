@extends('frontend.layouts.app')
@section('content')
    {{--{{dd($categories)}}--}}
    <!-- banner-1 section start -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <!-- widget -->
            <div class="widget">
                <h4 class="mb-30">Product Categories</h4>
                <div class="accordion" id="accordionExample">
                    <div class="list">
                        <a href="javascript:void(0)">Accessories <span>(0)</span></a>
                        <button class="float-right text-right" type="button" data-toggle="collapse" data-target="#collapse-1" aria-expanded="true">
                            <span class="float-right"><i class="fal fa-angle-right"></i></span>
                        </button>
                        <div id="collapse-1" class="collapse show" style="">
                            <div class="sidebar-list">
                                <ul>
                                    <li><a href="shop3.html">Camera 1</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="list">
                        <a href="javascript:void(0)">Char &amp; Table <span>(10)</span></a>
                        <button class="float-right text-right" type="button" data-toggle="collapse" data-target="#collapse-2" aria-expanded="true">
                            <span class="float-right"><i class="fal fa-angle-right"></i></span>
                        </button>
                        <div id="collapse-2" class="collapse show" style="">
                            <div class="sidebar-list">
                                <ul>
                                    <li><a href="shop.html">Chair <span>(30)</span></a></li>
                                    <li><a href="shop4.html">Clothing <span>(45)</span></a></li>
                                    <li><a href="shop4.html">Decore <span>(20)</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="list">
                        <a href="javascript:void(0)">Handbag <span>(10)</span></a>
                        <button class="float-right text-right" type="button" data-toggle="collapse" data-target="#collapse-3">
                            <span class="float-right"><i class="fal fa-angle-right"></i></span>
                        </button>
                        <div id="collapse-3" class="collapse">
                            <div class="sidebar-list">
                                <ul>
                                    <li><a href="shop4.html">Camerass <span>(1)</span></a></li>
                                    <li><a href="shop4.html">Gift Cards <span>(5)</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="list">
                        <a href="javascript:void(0)">Kids <span>(15)</span></a>
                        <button class="float-right text-right" type="button" data-toggle="collapse" data-target="#collapse-4" aria-expanded="true">
                            <span class="float-right"><i class="fal fa-angle-right"></i></span>
                        </button>
                        <div id="collapse-4" class="collapse show" style="">
                            <div class="sidebar-list">
                                <ul>
                                    <li><a href="shop3.html">Lightings <span>(1)</span></a></li>
                                    <li><a href="shop3.html">Managed <span>(5)</span></a></li>
                                    <li><a href="shop3.html">Printers <span>(32)</span></a></li>
                                    <li><a href="shop3.html">Shoes <span>(32)</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget mt-50">
                <h4 class="mb-30">Filter By Price</h4>
                <form action="#">
                    <div class="price-filter">
                        <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 46.4%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 15%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 60%;"></span>
                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div>
                            <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div></div>
                        <div class="filter-form-submit mt-35">
                            <button type="submit">Filter</button>
                            <div class="filter-price d-inline-block pl-20">Price: <input type="button" id="amount" value="$75 - $300"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="widget mt-50">
                <h4 class="mb-30">Filter By Color</h4>
                <ul class="color-list">
                    <li style="background-color: #000;"></li>
                    <li style="background-color: #1E73BE;"></li>
                    <li style="background-color: #FFD700;"></li>
                    <li style="background-color: #C9C9C9;"></li>
                    <li style="background-color: #008000;"></li>
                    <li style="background-color: #FFFF00;"></li>
                    <li style="background-color: #FFFFFF;"></li>
                    <li style="background-color: #DD3333;"></li>
                </ul>
            </div>
            <div class="widget mt-50">
                <h4 class="mb-30">Filter By Size</h4>
                <div class="size-link">
                    <a href="shop2.html">3xl</a>
                    <a href="shop2.html">l</a>
                    <a href="shop2.html">m</a>
                    <a href="shop2.html">s</a>
                    <a href="shop2.html">xl</a>
                    <a href="shop2.html">xxl</a>
                </div>
            </div>
            <div class="widget mt-50">
                <h4 class="mb-30">Featured</h4>
                <div class="post-box">
                    <ul>
                        <li>
                            <div class="post-img">
                                <img src="img/product/1.jpg" class="w-100" alt="">
                            </div>
                            <div class="post-img-desc">
                                <a href="single-product-4.html">Capitalize on low hanging fruit to</a>
                                <div class="price">$250.00</div>
                            </div>
                        </li>
                        <li>
                            <div class="post-img">
                                <img src="img/product/2.jpg" class="w-100" alt="">
                            </div>
                            <div class="post-img-desc">
                                <a href="single-product-4.html">
                                    Tassels pendant earringso</a>
                                <div class="price">$30 - $334</div>
                            </div>
                        </li>
                        <li>
                            <div class="post-img">
                                <img src="img/product/3.jpg" class="w-100" alt="">
                            </div>
                            <div class="post-img-desc">
                                <a href="single-product-4.html">
                                    Tassels pendant earringso</a>
                                <div class="price">$30 - $334</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="widget mt-50">
                <h4 class="mb-30">Popular Tags</h4>
                <div class="category-list">
                    <ul>
                        <li><a href="shop2.html">Accessories</a></li>
                        <li><a href="shop2.html">Clothing</a></li>
                        <li><a href="shop2.html">fashion</a></li>
                        <li><a href="shop2.html">Fly</a></li>
                        <li><a href="shop2.html">Glasses</a></li>
                        <li><a href="shop2.html">men</a></li>
                        <li><a href="shop2.html">Product</a></li>
                        <li><a href="shop2.html">version</a></li>
                        <li><a href="shop2.html">women</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach($products as $item)
                    @php
                        $images = json_decode($item->product_images);
                        //dd($images[0]);
                    @endphp
                    <div class="col-md-4">
                        <div class="product-box mb-40">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="{{asset('product_images/'.$images[0])}}" class="w-100" alt="">
                                    <a href="{{route('product.details', $item->id)}}" class="d-block">
                                        <div class="second-img">
                                            <img src="{{asset('product_images/'.$images[1])}}" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                        view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop2.html" class="product-category"><span>Woman</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-4.html" class="product-title">Light green crewnec...</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$58.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add
                                            to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</div>
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
@endsection
