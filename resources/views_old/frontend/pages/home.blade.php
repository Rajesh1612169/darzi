@extends('frontend.layouts.app')
@section('content')
{{--{{dd($categories)}}--}}
    <!-- banner-1 section start -->
@include('frontend.layouts.slider')

    <section class="banner-1 three-item" style="margin-top: 100px">
        <h2 class="mb-4 text-center">
            <span style="border-bottom: 1px solid #c59d50;padding-bottom: 5px;" >
            #Our Categories
            </span>
        </h2>
        <p class="text-center mb-4">Nam liber tempor cum soluta nobis eleifend option congue nihil <br>
            doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>
        <div class="container">
            <div class="row justify-content-center">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a href="{{route('shop.index')}}">
                        <img src="https://www.bombayshirts.com/cdn/shop/files/Artboard_1_25bc87ce-fc4e-4ece-bb57-fb4e7ede26ec.png?v=1696598412" alt="" style="width: 50%">
                        </a>
                        <br>
                        <br>
                        <a href="{{route('shop.index')}}" class="mt-3" style="font-size: 18px; font-weight: 500">Shirts</a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="{{route('shop.index')}}">
                        <img src="https://www.bombayshirts.com/cdn/shop/files/Artboard_1_25bc87ce-fc4e-4ece-bb57-fb4e7ede26ec.png?v=1696598412" alt="" style="width: 50%">
                        </a>
                        <br>
                        <br>
                        <a href="{{route('shop.index')}}" class="mt-3" style="font-size: 18px; font-weight: 500">Fabrics</a>
                    </div>

                </div>
{{--                @foreach($categories as $item)--}}
{{--                <div class="col-md-2">--}}
{{--                    <a href="{{ route('shop.index')  }}?category_id={{$item->id}}">--}}
{{--                        <div class="banner-img has-content body-banner">--}}
{{--                            <img src="{{ asset($item->product_category_image)  }}" class="w-100" alt="" style="border-radius: 10px">--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    <div class="mt-2">--}}
{{--                        <h6>{{$item->category_name}}</h6>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                @endforeach--}}
            </div>
        </div>
    </section>
    <!-- banner-1 section end -->
    <!-- our products section start -->
{{--    <section class="our-products" style="margin-top: 100px">--}}
{{--            <h2 class="mb-4 text-center">--}}
{{--                <span style="border-bottom: 1px solid #c59d50;padding-bottom: 5px;">--}}
{{--                     #Featured Products--}}
{{--                </span>--}}
{{--        </h2>--}}
{{--        <p class="text-center mb-4">Nam liber tempor cum soluta nobis eleifend option congue nihil <br>--}}
{{--            doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($products as $item)--}}
{{--                    @php--}}
{{--                        $images = json_decode($item->product_images);--}}
{{--                        //dd($images[0]);--}}
{{--                    @endphp--}}
{{--                    <div class="col-md-3">--}}
{{--                        <div class="product-box position-relative mb-40 middle-view">--}}
{{--                            <div class="product-box-wrapper">--}}
{{--                                <div class="product-img">--}}
{{--                                    <img src="{{asset('product_images/'.$images[0])}}" class="w-100 product_img" alt="">--}}
{{--                                    <a href="{{route('product.details', $item->id)}}" class="d-block"><div class="second-img">--}}
{{--                                            <img src="{{asset('product_images/'.$images[1])}}" style="border-radius: 10px" alt="" class="w-100">--}}
{{--                                        </div></a>--}}
{{--                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize eright-turquoise-color-hover">Quick view</a>--}}
{{--                                </div>--}}


{{--                                <div class="">--}}
{{--                                    <div class="product-desc-top">--}}
{{--                                        <div class="categories">--}}
{{--                                            <a href="shop2.html" class="product-category"><span>Sneaker</span></a>--}}
{{--                                            <a href="shop2.html" class="product-category"><span>Woman</span></a>--}}
{{--                                        </div>--}}
{{--                                        <a href="{{route('add.to.whishlist',['product_id' => $item->id])}}" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>--}}
{{--                                    </div>--}}
{{--                                    <a href="single-product-3.html" class="product-title eright-turquoise-color-hover">KIIK  – Modular bench seating</a>--}}
{{--                                    <div class="price-switcher">--}}
{{--                                        <span class="price switcher-item">${{$item->price}}</span>--}}
{{--                                        <form class="w-100" action="{{route('add.to.cart')}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            <input type="hidden" name="product_item_id" value="{{$item->id}}">--}}
{{--                                        <button type="submit" class="add-cart text-capitalize switcher-item" style="border: none;background: transparent;font-size: 14px;">+add to cart</button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- new arrival section end -->


{{--<section class="new-products" style="margin-top: 100px">--}}
{{--    <h2 class="mb-4 text-center">--}}
{{--                <span style="border-bottom: 1px solid #c59d50;padding-bottom: 5px;">--}}
{{--                     #New Collection--}}
{{--                </span>--}}
{{--    </h2>--}}
{{--    <p class="text-center mb-4">Nam liber tempor cum soluta nobis eleifend option congue nihil <br>--}}
{{--        doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            @foreach($products as $key=>$item)--}}

{{--                @php--}}

{{--                    $images = json_decode($item->product_images);--}}
{{--                    //dd($images[0]);--}}
{{--                @endphp--}}
{{--                <div class="col-md-3">--}}
{{--                    <div class="product-box position-relative mb-40 middle-view">--}}
{{--                        <div class="product-box-wrapper">--}}
{{--                            <div class="product-img">--}}
{{--                                <img src="{{asset('product_images/'.$images[0])}}" class="w-100 product_img" alt="">--}}
{{--                                <a href="{{route('product.details', $item->id)}}" class="d-block"><div class="second-img">--}}
{{--                                        <img src="{{asset('product_images/'.$images[1])}}" style="border-radius: 10px"  alt="" class="w-100">--}}
{{--                                    </div></a>--}}
{{--                                --}}{{--                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize eright-turquoise-color-hover">Quick view</a>--}}
{{--                            </div>--}}


{{--                            <div class="">--}}
{{--                                <div class="product-desc-top">--}}
{{--                                    <div class="categories">--}}
{{--                                        <a href="shop2.html" class="product-category"><span>Sneaker</span></a>--}}
{{--                                        <a href="shop2.html" class="product-category"><span>Woman</span></a>--}}
{{--                                    </div>--}}
{{--                                    <a href="{{route('add.to.whishlist',['product_id' => $item->id])}}" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>--}}
{{--                                </div>--}}
{{--                                <a href="single-product-3.html" class="product-title eright-turquoise-color-hover">KIIK  – Modular bench seating</a>--}}
{{--                                <div class="price-switcher">--}}
{{--                                    <span class="price switcher-item">$3.00</span>--}}
{{--                                    <form class="w-100" action="{{route('add.to.cart')}}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="product_item_id" value="{{$item->id}}">--}}
{{--                                        <button type="submit" class="add-cart text-capitalize switcher-item" style="border: none;background: transparent;font-size: 14px;">+add to cart</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- sugession start -->
<section class="sugession-product" style="margin-top: 100px">
    <div class="container-fluid">
        <div class="generic-title text-center">
            <h2 class="mb-4">
                <span style="border-bottom: 1px solid #c59d50;padding-bottom: 5px;">
                    #New In J.
                </span>

            </h2>
            <p class="text-center mb-4">Nam liber tempor cum soluta nobis eleifend option congue nihil <br>
                doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>
        </div>
        <div class="main-product-carousel owl-carousel red-nav mt-50">
            @foreach($jj_products as $item)
                @php
                    $images = json_decode($item->product_images);
                @endphp
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="{{asset('product_images/'.$images[0])}}" style="border-radius: 10px" class="w-100" alt="">
                                    <a href="{{route('product.details', $item->id)}}" class="d-block">
                                        <div class="second-img">
                                            <img src="{{asset('product_images/'.$images[1])}}" style="border-radius: 10px" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="{{route('product.details', $item->id)}}" class="product-category"><span>Men</span></a>
                                        </div>
                                        <a href="{{route('add.to.whishlist',['product_id' => $item->id])}}" class="wishlist float-right"><span><i
                                                    class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="{{route('product.details', $item->id)}}" class="product-title">{{$item->product_name}}</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$58.00</span>
                                        <form class="w-100" action="{{route('add.to.cart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_item_id" value="{{$item->id}}">
                                            <button type="submit" class="add-cart text-capitalize switcher-item" style="border: none;background: transparent;font-size: 14px;">+add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- sugession end -->


<!-- sugession start -->
<section class="sugession-product" style="margin-top: 100px">
    <div class="container-fluid">
        <div class="generic-title text-center">
            <h2 class="mb-5">
                <span style="border-bottom: 1px solid #c59d50;padding-bottom: 5px;">
                #New In Khadee`s
                </span>
            </h2>
            <p class="text-center mb-4">Nam liber tempor cum soluta nobis eleifend option congue nihil <br>
                doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>
        </div>
        <div class="main-product-carousel owl-carousel red-nav mt-50">
            @foreach($khadees_products as $item)
                @php
                    $images = json_decode($item->product_images);
                @endphp
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="{{asset('product_images/'.$images[0])}}" class="w-100" style="border-radius: 10px" alt="">
                                    <a href="{{route('product.details', $item->id)}}" class="d-block">
                                        <div class="second-img">
                                            <img src="{{asset('product_images/'.$images[1])}}" style="border-radius: 10px" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)"
                                       class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="{{route('product.details', $item->id)}}" class="product-category"><span>Men</span></a>
                                        </div>
                                        <a href="{{route('add.to.whishlist',['product_id' => $item->id])}}" class="wishlist float-right"><span><i
                                                    class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="{{route('product.details', $item->id)}}" class="product-title">{{$item->product_name}}</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$58.00</span>
                                        <form class="w-100" action="{{route('add.to.cart')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_item_id" value="{{$item->id}}">
                                            <button type="submit" class="add-cart text-capitalize switcher-item" style="border: none;background: transparent;font-size: 14px;">+add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- sugession end -->

{{--<section class="image_section" style="position: relative;background-image: url('{{asset('frontend/img//banner/bottom_banner.png')}}');    width: 100%;--}}
{{--    min-height: 600px;--}}
{{--    background-size: cover;--}}
{{--    background-position: top center;--}}
{{--}">--}}
{{--    <div style="position: absolute;--}}
{{--    bottom: 10%;--}}
{{--    right: 2%;--}}
{{--     left: 45%;--}}
{{--     text-align: center;--}}
{{--    ">--}}
{{--        <h2  style="color:white">New Spring drops from Over</h2>--}}
{{--        <p class="" style="color:white">Nam liber tempor cum soluta nobis eleifend option congue nihil</p>--}}
{{--        <p class="" style="color:white">doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>--}}
{{--        <p class="" style="color:white">Nam liber tempor cum soluta nobis eleifend option congue nihil</p>--}}
{{--        <p class="" style="color:white">doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>--}}
{{--        <a href="{{route('shop.index')}}" class="generic-btn mt-2 red-hover-btn text-uppercase" >--}}
{{--            Shop Now--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="banner-2 two-item" style="margin-top: 100px">
    <div class=" container-100-parcent">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6">
                <div class="banner-img style-2 has-content body-banner">
                    <a href="#"><img src="{{asset('frontend/img//Promotion_Darzi.png')}}" class="w-100" alt=""></a>
                    <div class="banner-content">
                        <h3 class="mb-0">Trending</h3>
                        <h3 class="mb-0">In Cotton <br> Fabrics</h3>
                        <p>Mesa Sale 20% Off Accessories</p>
                        <a href="{{route('shop.index')}}" class="mt-40"><span class="text-uppercase red-color">Buy now /</span>129.99</a>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="banner-img style-2 has-content body-banner">
                    <a href="#"><img src="{{asset('frontend/img//Promotion_Darzi_2.png')}}" class="w-100" alt=""></a>
                    <div class="banner-content">
                        <h3 class="mb-0">Trending</h3>
                        <h3 class="mb-0">In Blended <br> Fabrics</h3>
                        <p>Mesa Sale 20% Off Accessories</p>
                        <a href="{{route('shop.index')}}" class="mt-40"><span class="text-uppercase red-color">Buy now /</span>129.99</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{--<section class="blog" style="margin-top: 100px">--}}
{{--    <div class="container container-1430">--}}
{{--        <div class="generic-title text-center">--}}
{{--            <h2 class="mb-20">#From Our Blog</h2>--}}
{{--            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil</p>--}}
{{--            <p>doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>--}}
{{--        </div>--}}

{{--        <div class="row mt-4">--}}
{{--            <div class="col-md-3">--}}
{{--                <div class="blog-wrapper">--}}
{{--                    <div class="blog-box-img">--}}
{{--                        <a href="single-blog.htmlsingle-blog.html"><img src="{{asset('frontend/img/blog/1.jpg')}}" class="w-100" alt=""></a>--}}
{{--                        <div class="blog-box-tags">--}}
{{--                            <a href="blog.html">Image</a>--}}
{{--                            <a href="blog2.html">Travel</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="blog-box-desc text-center">--}}
{{--                        <div class="blog-box-link">--}}
{{--                            <a href="single-blog.html">Diam arcu, fringilla a sem condi cras</a>--}}
{{--                        </div>--}}
{{--                        <ul class="post-entry-data">--}}
{{--                            <li class="post-date">10 Jun, 2019</li>--}}
{{--                            <li class="post-by">Posted by <a href="javascript:void(0)">admin</a></li>--}}
{{--                            <li class="post-comments"><i class="fal fa-envelope"></i> 1 Comment(s)</li>--}}
{{--                        </ul>--}}
{{--                        <div class="blog-short-content">--}}
{{--                            <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide …</p>--}}
{{--                        </div>--}}
{{--                        <a href="single-blog-1.html" class="blog-box-action">Continue Reading</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <div class="blog-wrapper">--}}
{{--                    <div class="blog-box-img">--}}
{{--                        <a href="single-blog.htmlsingle-blog.html"><img src="{{asset('frontend/img/blog/1.jpg')}}" class="w-100" alt=""></a>--}}
{{--                        <div class="blog-box-tags">--}}
{{--                            <a href="blog.html">Image</a>--}}
{{--                            <a href="blog2.html">Travel</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="blog-box-desc text-center">--}}
{{--                        <div class="blog-box-link">--}}
{{--                            <a href="single-blog.html">Diam arcu, fringilla a sem condi cras</a>--}}
{{--                        </div>--}}
{{--                        <ul class="post-entry-data">--}}
{{--                            <li class="post-date">10 Jun, 2019</li>--}}
{{--                            <li class="post-by">Posted by <a href="javascript:void(0)">admin</a></li>--}}
{{--                            <li class="post-comments"><i class="fal fa-envelope"></i> 1 Comment(s)</li>--}}
{{--                        </ul>--}}
{{--                        <div class="blog-short-content">--}}
{{--                            <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide …</p>--}}
{{--                        </div>--}}
{{--                        <a href="single-blog-1.html" class="blog-box-action">Continue Reading</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <div class="blog-wrapper">--}}
{{--                    <div class="blog-box-img">--}}
{{--                        <a href="single-blog.htmlsingle-blog.html"><img src="{{asset('frontend/img/blog/1.jpg')}}" class="w-100" alt=""></a>--}}
{{--                        <div class="blog-box-tags">--}}
{{--                            <a href="blog.html">Image</a>--}}
{{--                            <a href="blog2.html">Travel</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="blog-box-desc text-center">--}}
{{--                        <div class="blog-box-link">--}}
{{--                            <a href="single-blog.html">Diam arcu, fringilla a sem condi cras</a>--}}
{{--                        </div>--}}
{{--                        <ul class="post-entry-data">--}}
{{--                            <li class="post-date">10 Jun, 2019</li>--}}
{{--                            <li class="post-by">Posted by <a href="javascript:void(0)">admin</a></li>--}}
{{--                            <li class="post-comments"><i class="fal fa-envelope"></i> 1 Comment(s)</li>--}}
{{--                        </ul>--}}
{{--                        <div class="blog-short-content">--}}
{{--                            <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide …</p>--}}
{{--                        </div>--}}
{{--                        <a href="single-blog-1.html" class="blog-box-action">Continue Reading</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3">--}}
{{--                <div class="blog-wrapper">--}}
{{--                    <div class="blog-box-img">--}}
{{--                        <a href="single-blog.htmlsingle-blog.html"><img src="{{asset('frontend/img/blog/1.jpg')}}" class="w-100" alt=""></a>--}}
{{--                        <div class="blog-box-tags">--}}
{{--                            <a href="blog.html">Image</a>--}}
{{--                            <a href="blog2.html">Travel</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="blog-box-desc text-center">--}}
{{--                        <div class="blog-box-link">--}}
{{--                            <a href="single-blog.html">Diam arcu, fringilla a sem condi cras</a>--}}
{{--                        </div>--}}
{{--                        <ul class="post-entry-data">--}}
{{--                            <li class="post-date">10 Jun, 2019</li>--}}
{{--                            <li class="post-by">Posted by <a href="javascript:void(0)">admin</a></li>--}}
{{--                            <li class="post-comments"><i class="fal fa-envelope"></i> 1 Comment(s)</li>--}}
{{--                        </ul>--}}
{{--                        <div class="blog-short-content">--}}
{{--                            <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide …</p>--}}
{{--                        </div>--}}
{{--                        <a href="single-blog-1.html" class="blog-box-action">Continue Reading</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</section>--}}
    <!-- Blog Section -->



{{--<section class="testimonial text-center" style="margin-top: 100px">--}}
{{--    <div class="container">--}}

{{--        <div class="heading white-heading">--}}
{{--            Testimonial--}}
{{--        </div>--}}
{{--        <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">--}}

{{--            <div class="carousel-inner" role="listbox">--}}
{{--                <div class="carousel-item active">--}}
{{--                    <div class="testimonial4_slide">--}}
{{--                        <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />--}}
{{--                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>--}}
{{--                        <h4>Client 1</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <div class="testimonial4_slide">--}}
{{--                        <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" /><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>--}}
{{--                        <h4>Client 2</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <div class="testimonial4_slide">--}}
{{--                        <img src="https://i.ibb.co/8x9xK4H/team.jpg" class="img-circle img-responsive" />--}}
{{--                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>--}}
{{--                        <h4>Client 3</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">--}}
{{--                <span class="carousel-control-prev-icon"></span>--}}
{{--            </a>--}}
{{--            <a class="carousel-control-next" href="#testimonial4" data-slide="next">--}}
{{--                <span class="carousel-control-next-icon"></span>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- Blog Section -->
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
