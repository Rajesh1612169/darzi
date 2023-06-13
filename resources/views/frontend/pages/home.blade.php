@extends('frontend.layouts.app')
@section('content')
{{--{{dd($categories)}}--}}
    <!-- banner-1 section start -->
@include('frontend.layouts.slider')

    <section class="banner-1 mt-30 three-item">
        <h3 class="ml-3 mb-3">
            Categories
        </h3>
        <div class="container">
            <div class="row justify-content-center">
                @foreach($categories as $item)
                <div class="col-md-2">
                    <a href="shop3.html">
                        <div class="banner-img has-content body-banner">
                            <img src="{{ asset($item->product_category_image)  }}" class="w-100" alt="">
                        </div>
                    </a>
                    <div class="mt-2">
                        <h6>{{$item->category_name}}</h6>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- banner-1 section end -->
    <!-- our products section start -->
    <section class="our-products mt-120">
        <h3 class="ml-3 mb-3">
            Our Products
        </h3>
        <div class="container">
            <div class="row">
                @foreach($products as $item)
                    @php
                        $images = json_decode($item->product_images);
                        //dd($images[0]);
                    @endphp
                    <div class="col-md-3">
                        <div class="product-box position-relative mb-40 middle-view">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="{{asset('product_images/'.$images[0])}}" class="w-100" alt="">
                                    <a href="{{route('product.details', $item->id)}}" class="d-block"><div class="second-img">
                                            <img src="{{asset('product_images/'.$images[1])}}" alt="" class="w-100">
                                        </div></a>
{{--                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize eright-turquoise-color-hover">Quick view</a>--}}
                                </div>

                                <div class="product-desc">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop2.html" class="product-category"><span>Sneaker</span></a>
                                            <a href="shop2.html" class="product-category"><span>Woman</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title eright-turquoise-color-hover">KIIK  – Modular bench seating</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$3.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- new arrival section end -->

    <!-- Blog Section -->
<section class="blog mt-120">
    <div class="container container-1430">
        <div class="generic-title text-center">
            <h2 class="mb-20">#From Our Blog</h2>
            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil</p>
            <p>doming id quod mazim placerat facer possim assum typi non habent claritatem insitam.</p>
        </div>

        <div class="row mt-4">
            <div class="col-md-3">
                <div class="blog-wrapper">
                    <div class="blog-box-img">
                        <a href="single-blog.htmlsingle-blog.html"><img src="{{asset('frontend/img/blog/1.jpg')}}" class="w-100" alt=""></a>
                        <div class="blog-box-tags">
                            <a href="blog.html">Image</a>
                            <a href="blog2.html">Travel</a>
                        </div>
                    </div>
                    <div class="blog-box-desc text-center">
                        <div class="blog-box-link">
                            <a href="single-blog.html">Diam arcu, fringilla a sem condi cras</a>
                        </div>
                        <ul class="post-entry-data">
                            <li class="post-date">10 Jun, 2019</li>
                            <li class="post-by">Posted by <a href="javascript:void(0)">admin</a></li>
                            <li class="post-comments"><i class="fal fa-envelope"></i> 1 Comment(s)</li>
                        </ul>
                        <div class="blog-short-content">
                            <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide …</p>
                        </div>
                        <a href="single-blog-1.html" class="blog-box-action">Continue Reading</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="blog-wrapper">
                    <div class="blog-box-img">
                        <a href="single-blog.htmlsingle-blog.html"><img src="{{asset('frontend/img/blog/1.jpg')}}" class="w-100" alt=""></a>
                        <div class="blog-box-tags">
                            <a href="blog.html">Image</a>
                            <a href="blog2.html">Travel</a>
                        </div>
                    </div>
                    <div class="blog-box-desc text-center">
                        <div class="blog-box-link">
                            <a href="single-blog.html">Diam arcu, fringilla a sem condi cras</a>
                        </div>
                        <ul class="post-entry-data">
                            <li class="post-date">10 Jun, 2019</li>
                            <li class="post-by">Posted by <a href="javascript:void(0)">admin</a></li>
                            <li class="post-comments"><i class="fal fa-envelope"></i> 1 Comment(s)</li>
                        </ul>
                        <div class="blog-short-content">
                            <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide …</p>
                        </div>
                        <a href="single-blog-1.html" class="blog-box-action">Continue Reading</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="blog-wrapper">
                    <div class="blog-box-img">
                        <a href="single-blog.htmlsingle-blog.html"><img src="{{asset('frontend/img/blog/1.jpg')}}" class="w-100" alt=""></a>
                        <div class="blog-box-tags">
                            <a href="blog.html">Image</a>
                            <a href="blog2.html">Travel</a>
                        </div>
                    </div>
                    <div class="blog-box-desc text-center">
                        <div class="blog-box-link">
                            <a href="single-blog.html">Diam arcu, fringilla a sem condi cras</a>
                        </div>
                        <ul class="post-entry-data">
                            <li class="post-date">10 Jun, 2019</li>
                            <li class="post-by">Posted by <a href="javascript:void(0)">admin</a></li>
                            <li class="post-comments"><i class="fal fa-envelope"></i> 1 Comment(s)</li>
                        </ul>
                        <div class="blog-short-content">
                            <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide …</p>
                        </div>
                        <a href="single-blog-1.html" class="blog-box-action">Continue Reading</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="blog-wrapper">
                    <div class="blog-box-img">
                        <a href="single-blog.htmlsingle-blog.html"><img src="{{asset('frontend/img/blog/1.jpg')}}" class="w-100" alt=""></a>
                        <div class="blog-box-tags">
                            <a href="blog.html">Image</a>
                            <a href="blog2.html">Travel</a>
                        </div>
                    </div>
                    <div class="blog-box-desc text-center">
                        <div class="blog-box-link">
                            <a href="single-blog.html">Diam arcu, fringilla a sem condi cras</a>
                        </div>
                        <ul class="post-entry-data">
                            <li class="post-date">10 Jun, 2019</li>
                            <li class="post-by">Posted by <a href="javascript:void(0)">admin</a></li>
                            <li class="post-comments"><i class="fal fa-envelope"></i> 1 Comment(s)</li>
                        </ul>
                        <div class="blog-short-content">
                            <p>A Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide …</p>
                        </div>
                        <a href="single-blog-1.html" class="blog-box-action">Continue Reading</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
    <!-- Blog Section -->
@endsection
