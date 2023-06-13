@extends('frontend.layouts.app')
@section('content')
    <!-- single product start -->
    <section class="single-product mb-90">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" class="mb-40">
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Products</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$product->product_name}}</li>
                </ol>
            </nav>
            <div class="shop-wrapper">
                <div class="single-product-top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-4 col-12">
                            <div class="shop-img">
                                <div class="row">
                                    @foreach($product_images as $item)
                                    <div class="col-md-6">
                                        <a href="{{asset('product_images/'.$item)}}" class="popup-image"><img
                                                src="{{asset('product_images/'.$item)}}" class="w-100 mb-30" alt=""></a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-8 col-12">
                            <div class="single-product-sidebar">
                                <div class="product-content">
                                    <div class="single-product-title">
                                        <h2>{{$product->product_name}}</h2>
                                    </div>
                                    <div class="single-product-price">$<span>{{$product->price}}</span></div>
                                    <div class="single-product-desc mb-25">
                                        <p>{{$product->short_description}}</p>

                                    </div>

                                    <div class="quick-quantity mt-10">
                                        <div class="total-cart"><span class="cart-count">{{$product->qty_in_stock}} in stock (can be
                                                    backordered)</span></div>
                                        <form action="{{route('add.to.cart')}}" method="POST">
                                            @csrf

                                            @php
                                            $user_id = \Illuminate\Support\Facades\Auth::user()->id;
//                                            dd($product->id);
                                            @endphp
                                            <input type="text" name="user_id" value="{{$user_id}}">
                                            <input type="text" name="product_item_id" value="{{$product->id}}">
                                            <button type="submit" class="list-add-cart-btn red-hover-btn border-0"
                                                    style="padding-left: 80px;padding-right: 80px;transition: all .5s;">add to cart
                                            </button>
                                        </form>
                                    </div>
                                    <div class="single-product-component col-md-6">
                                        <button type="button" class="generic-btn mt-70 red-hover-btn text-uppercase" data-toggle="modal" data-target="#exampleModalRight">
                                            Customization
                                        </button>
                                    </div>
                                    <div class="single-product-action mt-35">
                                        <ul>
                                            <li><a href="wishlist.html"><i class="fal fa-heart"></i> add to wishlist</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="sku"><span>Sku: </span> <strong>M-Hat-8</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-product-bottom mt-80 gray-border-top">
                    <ul class="nav nav-pills justify-content-center mt-100" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="active" data-toggle="pill" href="#desc-tab-1">Description</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="pill" href="#desc-tab-3">Additional information</a>
                        </li>
                    </ul>
                    <div class="container container-1200">
                        <div class="tab-content mt-60" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="desc-tab-1">
                                <div class="single-product-tab-content">
                                    <h3 class="title mb-30">Description</h3>
                                  <p>
                                      {{$product->long_description}}
                                  </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="desc-tab-3">
                                <div class="single-product-tab-content">
                                    <h3 class="title mb-30">Additional information</h3>
                                    <table class="table table-striped">
                                        <tbody>
                                        <tr>
                                            <th>size</th>
                                            <td>
                                                <ul>
                                                    <li><a href="shop2.html">3XL</a></li>
                                                    <li><a href="shop2.html">L</a></li>
                                                    <li><a href="shop2.html">M</a></li>
                                                    <li><a href="shop2.html">S</a></li>
                                                    <li><a href="shop2.html">XL</a></li>
                                                    <li><a href="shop2.html">XXL</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>color</th>
                                            <td>
                                                <ul>
                                                    <li><a href="shop2.html">Black</a></li>
                                                    <li><a href="shop2.html">Blue</a></li>
                                                    <li><a href="shop2.html">Gold</a></li>
                                                    <li><a href="shop2.html">Gray</a></li>
                                                    <li><a href="shop2.html">White</a></li>
                                                    <li><a href="shop2.html">Yellow</a></li>
                                                    <li><a href="shop2.html">Red</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- single product end -->
    <!-- sugession start -->
    <section class="sugession-product mt-120">
        <div class="container-fluid">
            <div class="generic-title text-center">
                <h2 class="mb-20">You May Also Like</h2>
            </div>
            <div class="main-product-carousel owl-carousel red-nav mt-50">
                @foreach($related_products as $item)
                    @php
                        $images = json_decode($item->product_images);
                    @endphp
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="{{asset('product_images/'.$images[0])}}" class="w-100" alt="">
                                    <a href="{{route('product.details', $item->id)}}" class="d-block">
                                        <div class="second-img">
                                            <img src="{{asset('product_images/'.$images[1])}}" alt="" class="w-100">
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
                                        <a href="wishlist.html" class="wishlist float-right"><span><i
                                                    class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="{{route('product.details', $item->id)}}" class="product-title">{{$item->product_name}}</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$58.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to
                                            cart</a>
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
    <!-- Modal -->
    <div class="modal fade drawer right-align" id="exampleModalRight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customize Size</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span style="font-size: 12px">Question 0 of 5</span>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div>
                    <!-- Body type -->
                    <p class="mt-5">Select body type</p>
                    <div class="row">
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img1" class="d-none imgbgchk" value="">
                            <label for="img1">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 1">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img2" class="d-none imgbgchk" value="">
                            <label for="img2">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 2">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img3" class="d-none imgbgchk" value="">
                            <label for="img3">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 3">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>

                    </div>
                    <!-- Body type -->

                    <!--  Select Height   -->
                    <p class="mt-5">Select Height</p>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="option" value="1" checked>
                            <div class="radio-button"><span>1</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="2">
                            <div class="radio-button"><span>2</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="3">
                            <div class="radio-button"><span>3</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="4">
                            <div class="radio-button"><span>4</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="5">
                            <div class="radio-button"><span>5</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="6">
                            <div class="radio-button"><span>6</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="7">
                            <div class="radio-button"><span>7</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="8">
                            <div class="radio-button"><span>8</span></div>
                        </label>

                    </div>
                    <!--  Select Height   -->

                    <!--Select Shirt Size-->
                    <p class="mt-5">Select Shirt Size</p>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="option" value="1" checked>
                            <div class="radio-button"><span>1</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="2">
                            <div class="radio-button"><span>2</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="3">
                            <div class="radio-button"><span>3</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="4">
                            <div class="radio-button"><span>4</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="5">
                            <div class="radio-button"><span>5</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="6">
                            <div class="radio-button"><span>6</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="7">
                            <div class="radio-button"><span>7</span></div>
                        </label>
                        <label>
                            <input type="radio" name="option" value="8">
                            <div class="radio-button"><span>8</span></div>
                        </label>

                    </div>

                    <!-- Select Shoulder Type -->
                    <p class="mt-5">Select Shoulder Type</p>
                    <div class="row">
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img1" class="d-none imgbgchk" value="">
                            <label for="img1">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 1">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img2" class="d-none imgbgchk" value="">
                            <label for="img2">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 2">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img3" class="d-none imgbgchk" value="">
                            <label for="img3">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 3">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>

                    </div>
                    <!-- Select Shoulder Type -->

                    <!-- Select Preferred Fit -->
                    <p class="mt-5">Select Preferred Fit</p>
                    <div class="row">
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img1" class="d-none imgbgchk" value="">
                            <label for="img1">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 1">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img2" class="d-none imgbgchk" value="">
                            <label for="img2">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 2">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="imgbackground" id="img3" class="d-none imgbgchk" value="">
                            <label for="img3">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 3">
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>

                    </div>
                    <!-- Select Preferred Fit -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
