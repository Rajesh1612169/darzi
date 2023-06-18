@extends('frontend.layouts.app')
@section('content')
@if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if(session()->has('errors'))
            <div class="alert alert-danger">
                {{ session()->get('errors') }}
            </div>
        @endif
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
                            <div class="single-product-sidebar w-75">
                                <div class="product-content">
                                    <div class="single-product-title">
                                        <h2>{{$product->product_name}}</h2>
                                    </div>
                                    <div class="single-product-price">$ {{$product->price}} <span style="color: grey;font-size: 16px"><small>Incl. All Taxes</small></span></div>
                                    <div class="single-product-desc mb-25">
                                        <p>{{$product->short_description}}</p>

                                    </div>

                                    @php
                                        $user = \Illuminate\Support\Facades\Auth::user();
                                        if (isset($user->id) && $user->id) {
                                            $user_id = $user->id;
                                        }
                                            $my_size = \Illuminate\Support\Facades\DB::table('user_sizes')
                                            ->where('user_id','=', isset($user_id) && $user_id)
                                            ->first();
                                            //dd($my_size);
                                    if ($my_size !== null) {
                                    @endphp
                                    <div class="fitsmart-button">
                                        <div class="measureImg"><img src="https://cdn.shopify.com/s/files/1/0538/8841/7962/files/Vector_d6c0b66a-8373-4808-8fa4-9e25739f1dff.svg?v=1674474320"></div>
                                        <div class="fitsmart-info">Your custom size is saved with us.</div>
                                        <div>
                                            <a type="button" data-toggle="modal" data-target="#exampleModalRight" style="cursor: pointer">View</a>
                                        </div>
                                    </div>
                                    @php
                                        }
                                    @endphp
                                    <div class="quick-quantity mt-10">
                                        <div class="total-cart"><span class="cart-count">{{$product->qty_in_stock}} in stock (can be
                                                    backordered)</span></div>
                                     <div class="d-flex">
                                         <form class="w-100" action="{{route('add.to.cart')}}" method="POST">
                                             @csrf
                                             <input type="hidden" name="product_item_id" value="{{$product->id}}">
                                           <div class="d-flex align-items-baseline">
                                               @php
                                                if (\Illuminate\Support\Facades\Auth::check()) {

                                               @endphp
                                               <button type="submit" class="mt-0 mr-2 w-50 generic-btn red-hover-btn text-uppercase"
                                                      >ADD TO CART
                                               </button>
                                               <button type="button" class="mt-0 w-50 generic-btn red-hover-btn text-uppercase" data-toggle="modal" data-target="#exampleModalRight">
                                                   Customization
                                               </button>
                                               @php
                                                   } else {

                                               @endphp
                                               <button type="button" class="w-50 generic-btn mt-4 red-hover-btn text-uppercase" data-toggle="modal" data-target="#loginModal">
                                                   Customization
                                               </button>

                                               @php


                                                   }
                                               @endphp

                                           </div>
                                         </form>

                                     </div>

                                    </div>
{{--                                    <div class="single-product-component col-md-6">--}}


{{--                                        <button type="button" class="generic-btn mt-70 red-hover-btn text-uppercase" >--}}
{{--                                            Your Size is saved in our system--}}
{{--                                        </button>--}}

{{--                                        <button type="button" class="generic-btn mt-70 red-hover-btn text-uppercase" data-toggle="modal" data-target="#exampleModalRight">--}}
{{--                                            Customization--}}
{{--                                        </button>--}}

{{--                                    </div>--}}
                                    <div class="d-flex mt-3 flex-wrap">
                                        <div class="sku mr-5" style="margin-top: 2px;"><span>Sku: </span> <strong>M-Hat-8</strong></div>
                                        <div class="single-product-action">
                                            <ul>
                                                <li><a href="{{route('add.to.whishlist',['product_id' => $product->id])}}"><i class="fal fa-heart"></i> add to wishlist</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="fitsmart-button">
                                        <div class="measureImg"><img src="https://cdn.shopify.com/s/files/1/0536/3594/0515/files/Group_34195.svg?v=1662464147"></div>
                                        <div class="fitsmart-info">Estimated Free Shipping by <strong>Jun 28, 2023</strong>
                                        </div>
                                    </div>
                                    <div class="single-product-bottom gray-border-top">
                                        <ul class="nav nav-pills mt-50" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a data-toggle="pill" href="#desc-tab-1">Materials</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="active" data-toggle="pill" href="#desc-tab-2">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a data-toggle="pill" href="#desc-tab-3">Washcare</a>
                                            </li>
                                        </ul>
                                        <div class="container container-1200">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show" id="desc-tab-1">
                                                    <div class="single-product-tab-content">
                                                        <p><strong>Composition</strong> : 100% Cotton</p>
                                                        <p><strong>Weave</strong> : Poplin</p>
                                                        <p><strong>Weight</strong> : Medium</p>
                                                        <p><strong>Stretch</strong> : No Stretch</p>
                                                        <p><strong>Shine</strong> : No Sheen</p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show active" id="desc-tab-2">
                                                    <div class="single-product-tab-content">
                                                        <p>
                                                            {{$product->long_description}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="desc-tab-3">
                                                    <div class="single-product-tab-content">
                                                        <ul>

                                                            <li>When dealing with cotton: </li>

                                                            <li>Hand or machine wash with cold water. </li>

                                                            <li>Air dry in the shade. </li>

                                                            <li>Do not dry clean or tumble dry. </li>

                                                            <li>Iron on hot using steam. </li>

                                                            <li>Do not iron on suede.</li>

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


{{--                    <span style="font-size: 12px">Question 0 of 5</span>--}}
{{--                    <div class="progress">--}}
{{--                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>--}}
{{--                    </div>--}}
                    <!-- Body type -->
                    <form method="post" action="{{route('size.store')}}">
                        @csrf
                    <p class="">Select body type</p>
                    <div class="row">
                        <div class='col text-center'>
                            <input type="radio" name="body_type" id="img1" class="d-none imgbgchk" value="athletic" {{isset($my_size->body_type) && $my_size->body_type == 'athletic' ? 'checked': ''}}>
                            <label for="img1">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 1">
                                <p>Athletic</p>
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="body_type" id="img2" class="d-none imgbgchk" value="slight_belly" {{isset($my_size->body_type) && $my_size->body_type == 'slight_belly' ? 'checked': ''}}>
                            <label for="img2">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 2">
                                <p>Slight Belly</p>
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="body_type" id="img3" class="d-none imgbgchk" value="significiant_belly" {{isset($my_size->body_type) && $my_size->body_type == 'significiant_belly' ? 'checked': ''}}>
                            <label for="img3">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 3">
                                <p>Significiant Belly</p>
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
                            <input type="radio" name="height" value="1" {{isset($my_size->height) && $my_size->height == '1' ? 'checked': ''}}>
                            <div class="radio-button"><span>1</span></div>
                        </label>
                        <label>
                            <input type="radio" name="height" value="2" {{isset($my_size->height) && $my_size->height == '2' ? 'checked': ''}}>
                            <div class="radio-button"><span>2</span></div>
                        </label>
                        <label>
                            <input type="radio" name="height" value="3" {{isset($my_size->height) && $my_size->height == '3' ? 'checked': ''}}>
                            <div class="radio-button"><span>3</span></div>
                        </label>
                        <label>
                            <input type="radio" name="height" value="4" {{isset($my_size->height) && $my_size->height == '4' ? 'checked': ''}}>
                            <div class="radio-button"><span>4</span></div>
                        </label>
                        <label>
                            <input type="radio" name="height" value="5" {{isset($my_size->height) && $my_size->height == '5' ? 'checked': ''}}>
                            <div class="radio-button"><span>5</span></div>
                        </label>
                        <label>
                            <input type="radio" name="height" value="6" {{isset($my_size->height) && $my_size->height == '6' ? 'checked': ''}}>
                            <div class="radio-button"><span>6</span></div>
                        </label>
                        <label>
                            <input type="radio" name="height" value="7" {{isset($my_size->height) && $my_size->height == '7' ? 'checked': ''}}>
                            <div class="radio-button"><span>7</span></div>
                        </label>
                        <label>
                            <input type="radio" name="height" value="8" {{isset($my_size->height) && $my_size->height == '8' ? 'checked': ''}}>
                            <div class="radio-button"><span>8</span></div>
                        </label>

                    </div>
                    <!--  Select Height   -->

                    <!--Select Shirt Size-->
                    <p class="mt-5">Select Shirt Size</p>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="shirt_size" value="1" {{isset($my_size->size) && $my_size->size == '1' ? 'checked': ''}}>
                            <div class="radio-button"><span>1</span></div>
                        </label>
                        <label>
                            <input type="radio" name="shirt_size" value="2" {{isset($my_size->size) && $my_size->size == '2' ? 'checked': ''}}>
                            <div class="radio-button"><span>2</span></div>
                        </label>
                        <label>
                            <input type="radio" name="shirt_size" value="3" {{isset($my_size->size) && $my_size->size == '3' ? 'checked': ''}}>
                            <div class="radio-button"><span>3</span></div>
                        </label>
                        <label>
                            <input type="radio" name="shirt_size" value="4" {{isset($my_size->size) && $my_size->size == '4' ? 'checked': ''}}>
                            <div class="radio-button"><span>4</span></div>
                        </label>
                        <label>
                            <input type="radio" name="shirt_size" value="5" {{isset($my_size->size) && $my_size->size == '5' ? 'checked': ''}}>
                            <div class="radio-button"><span>5</span></div>
                        </label>
                        <label>
                            <input type="radio" name="shirt_size" value="6" {{isset($my_size->size) && $my_size->size == '6' ? 'checked': ''}}>
                            <div class="radio-button"><span>6</span></div>
                        </label>
                        <label>
                            <input type="radio" name="shirt_size" value="7" {{isset($my_size->size) && $my_size->size == '7' ? 'checked': ''}}>
                            <div class="radio-button"><span>7</span></div>
                        </label>
                        <label>
                            <input type="radio" name="shirt_size" value="8" {{isset($my_size->size) && $my_size->size == '8' ? 'checked': ''}}>
                            <div class="radio-button"><span>8</span></div>
                        </label>

                    </div>

                    <!-- Select Shoulder Type -->
                    <p class="mt-5">Select Shoulder type</p>
                    <div class="row">
                        <div class='col text-center'>
                            <input type="radio" name="shoulder_type" id="img4" class="d-none imgbgchk" value="average" {{isset($my_size->type) && $my_size->type == 'average' ? 'checked': ''}}>
                            <label for="img4">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 1">
                                <p>Average</p>
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="shoulder_type" id="img5" class="d-none imgbgchk" value="slopping" {{isset($my_size->type) && $my_size->type == 'slopping' ? 'checked': ''}}>
                            <label for="img5">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 2">
                                <p>Sloping</p>
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
                            <input type="radio" name="prefered_fir" id="img6" class="d-none imgbgchk" value="slim" {{isset($my_size->fit) && $my_size->fit == 'slim' ? 'checked': ''}}>
                            <label for="img6">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 1">
                                <p>Super Slim</p>
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>

                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="prefered_fir" id="img7" class="d-none imgbgchk" value="structure" {{isset($my_size->fit) && $my_size->fit == 'structure' ? 'checked': ''}}>
                            <label for="img7">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 2">
                                <p>Structured</p>
                                <div class="tick_container">
                                    <div class="tick"><i class="fa fa-check"></i></div>
                                </div>
                            </label>
                        </div>
                        <div class='col text-center'>
                            <input type="radio" name="prefered_fir" id="img8" class="d-none imgbgchk" value="relax" {{isset($my_size->fit) && $my_size->fit == 'relax' ? 'checked': ''}}>
                            <label for="img8">
                                <img src="https://cdn.shopify.com/s/files/1/0522/4238/3010/files/Athletic.svg" alt="Image 3">
                                <p>Relaxed</p>
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
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    {{-- Login Model   --}}
<div class="modal fade drawer right-align" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login To Continue</h5>
            </div>
            <div class="modal-body">
                <h4 class="text-center mt-4 mb-4">
                    Customer Login
                </h4>
                <form method="post" action="{{route('pd.login.post')}}">
                    @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email address</label>
                        <input type="email" id="email" name="email" class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
            </form>
        </div>
    </div>
</div>
    {{-- Login Model   --}}
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
