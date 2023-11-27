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

    <style>

        .custom-checkbox {
            display: none;
        }

        .custom-label {
            position: relative;
            cursor: pointer;
            display: block;
            width: 40px;
            height: 20px;
            background: #cccccc;
            border-radius: 50px;
            transition: background 300ms linear;
            margin-top: 2px;
        }

        .custom-label:before {
            position: absolute;
            top: 50%;
            left: 2px;
            transform: translateY(-50%);
            content: "";
            display: block;
            width: 15px;
            height: 15px;
            background: #ffffff;
            border-radius: 50%;
            transition: left 300ms linear;
        }

        .custom-checkbox:checked + .custom-label {
            background: #eb2323;
        }

        .custom-checkbox:checked + .custom-label:before {
            left: 23px;
        }

        .modal-content {
            background-color: #f5f5f5;
        }
        .nav-item .active {
            background-color: unset!important;
        }

        .modal-product-customization {
            max-width: 1000px!important;
        }
    .modal-product-customization-pages {
        max-width: 900px!important;
    }
    /*  Coller btn css  */
        .collar-div {
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            background-color: white;
            transform: translate(300%, 120%);
            /* border: 1px solid black; */
            border-radius: 35px;
            padding: 3px 5px;
            font-size: 14px;
        }
        .collar-div span {
            font-size: 12px;
            font-weight: 500;
        }
        .option-btn {
            border-radius: 30px;
            color: white;
            border: 0;
            background: #eb2323;
            width: 25px;
            height: 25px;
        }
        .sleeves-div {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            transform: translate(340%, 1035%);
            background-color: white;
            /* border: 1px solid black; */
            border-radius: 35px;
            padding: 3px 5px;
            font-size: 14px;
        }
        .sleeves-div span {
            font-size: 12px;
            font-weight: 500;
        }
        .pocket-div {
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(400%, 550%);
            background-color: white;
            /* border: 1px solid black; */
            border-radius: 35px;
            padding: 3px 5px;
            font-size: 14px;
        }
        .pocket-div span {
            font-size: 12px;
            font-weight: 500;
        }
        .buttons-div {
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(270%, 1000%);
            background-color: white;
            /* border: 1px solid black; */
            border-radius: 35px;
            padding: 3px 5px;
            font-size: 14px;
        }
        .buttons-div span {
            font-size: 12px;
            font-weight: 500;
        }
     .placket-div {
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            transform: translate(270%, 700%);
            background-color: white;
            /* border: 1px solid black; */
            border-radius: 35px;
            padding: 3px 5px;
            font-size: 14px;
        }
        .placket-div span {
            font-size: 12px;
            font-weight: 500;
        }

     .back-div {
                cursor: pointer;
                position: absolute;
                top: 0;
                left: 0;
                transform: translate(370%, 1300%);
                background-color: white;
                /* border: 1px solid black; */
                border-radius: 35px;
                padding: 3px 5px;
                font-size: 14px;
            }
            .back-div span {
                font-size: 12px;
                font-weight: 500;
            }


    .product_option_css {
        background: none;
        border: 1px solid grey;
        height: 100px;
        width: 100%;
    }

        .product_option_css img{
            width: 60px;
    }

    </style>
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
    {{--                                               <button type="button" class="mt-0 w-50 generic-btn red-hover-btn text-uppercase" data-toggle="modal" data-target="#exampleModalRight">--}}
    {{--                                                   Customization--}}
    {{--                                               </button>--}}
                                                   <button type="button" class="mt-0 w-50 generic-btn red-hover-btn text-uppercase" data-toggle="modal" data-target="#productCustomization" contenteditable="false">
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
            <div class="modal-dialog" role="document" >
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
                        <button type="button" class=" w-50 generic-btn red-hover-btn text-uppercase" data-dismiss="modal">Close</button>
                        <button type="submit" class=" w-50 generic-btn red-hover-btn text-uppercase">Save changes</button>
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
                <div class="modal-body p-5">
    {{--                <h4 class="text-center mt-4 mb-4">--}}
    {{--                    Customer Login--}}
    {{--                </h4>--}}
                    <div class="text-center mt-80">
                        <img src="{{asset('frontend/img/logo/logo.png')}}" class="img-fluid w-25" alt="">
                    </div>
                    <form method="post" action="{{route('pd.login.post')}}">
                        @csrf
                        <div class="form-outline  mb-4">
                            <label class="form-label" for="email">Email address</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email Address" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password"/>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="w-50 generic-btn mt-4 red-hover-btn text-uppercase text-center">Submit</button>
                        </div>

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

    {{--    Product Customiation Page --}}
    <!-- Modal -->
    <div class="modal fade" id="productCustomization" tabindex="-1" role="dialog" aria-labelledby="productCustomizationTitle" aria-hidden="true">
        <div class="modal-product-customization modal-dialog modal-dialog-centered " role="document" style="min-width: 85%;
    max-height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Customized Your Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="float-right d-flex">
                              <span style="color: #504f4f">PREVIEW SHIRT&nbsp;&nbsp;</span>
                              <input type="checkbox" id="toggle-btn" class="custom-checkbox" onchange="previewShirt(this.checked)">
                              <label for="toggle-btn" class="custom-label"></label>
                          </div>
                      </div>
                      <div class="col-md-6"></div>
                      <div class="col-md-6">
                          <div style="position: relative;background: #e1e1e1;border-radius: 10px">
                              <img id="product_main_image" style="position: relative;width: 100%" src="https://bombayshirts.picarioxpo.com/bsc-bottom.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,,,,&p.c=,,,,,,&p.tr=True,True,True,True,True,True,True,True&p.tr=True,True,True&p.trt=,,,,,90,90,90&p.text=,,,,,,,,,,&p.text.color=,,,,,,,,,,&p.text.font=,,,,,,,,Bell%20MT,Bell%20MT,Bell%20MT&p.text.size=,,,,,,,,250,80,50&p.text.px=,,,,,,,,0.5,0.48,0.60&p.text.py=,,,,,,,,0.3,0.5,0.49&p.text.align=,,,,,,,,1,1,1" alt="">
                              <img id="product_main_image_collar" style="position: absolute;left:0;width: 100%" src="https://bombayshirts.picarioxpo.com/bsc-collar-club.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,d3d3d3,ffffff&p.tr=True,True,True,True,True" alt="">
                              <img id="product_main_image_sleeves" style="position: absolute;left:0;width: 100%" src="https://bombayshirts.picarioxpo.com/bsc-sleeve-long-regular.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,,d3d3d3,ffffff&p.tr=True,True" alt="">
                              <img id="product_main_image_cuff" style="position: absolute;left:0;width: 100%" src="" alt="">
                              <img id="product_main_image_pocket" style="position: absolute;left:0;width: 100%" src="" alt="">
                              <img id="product_main_image_placket" style="position: absolute;left:0;width: 100%" src="" alt="">
                              <img id="product_main_image_button" style="position: absolute;left:0;width: 100%" src="" alt="">
                              <img style="position: absolute;left:0;width: 100%" src="https://bombayshirts.picarioxpo.com/bsc-collar-base-single-button.pfs?1=1&width=500&p.tn=newbutton_grey.jpg&p.c=,d3d3d3,ffffff&p.tr=True,True" alt="">

                              <div class="collar-div" data-toggle="modal" data-target="#coller_modal">
                                  <button type="button" class="option-btn collar_btn">
                                      <i class="fal fa-plus"></i>
                                  </button>
                                  <span>COLLAR</span>
                              </div>
                              <div class="sleeves-div" data-toggle="modal" data-target="#sleeves_modal">
                                  <button type="button" class="option-btn sleeves_btn">
                                      <i class="fal fa-plus"></i>
                                  </button>
                                  <span>SlEEVES & CUFF</span>
                              </div>
                              <div class="pocket-div" data-toggle="modal" data-target="#pocket_modal">
                                  <button type="button" class="option-btn pocket_btn">
                                      <i class="fal fa-plus"></i>
                                  </button>
                                  <span>POCKET</span>
                              </div>
                              <div class="buttons-div" data-toggle="modal" data-target="#button_modal">
                                  <button type="button" class="option-btn buttons_btn">
                                      <i class="fal fa-plus"></i>
                                  </button>
                                  <span>BUTTONS</span>
                              </div>

                              <div class="placket-div" data-toggle="modal" data-target="#placket_modal">
                                  <button type="button" class="option-btn placket_btn">
                                      <i class="fal fa-plus"></i>
                                  </button>
                                  <span>PLACKET</span>
                              </div>

                              <div class="back-div" data-toggle="modal" data-target="#back_modal">
                                  <button type="button" class="option-btn back_btn">
                                      <i class="fal fa-plus"></i>
                                  </button>
                                  <span>BACK</span>
                              </div>


                              {{--                          <button type="button" class="culf-btn" data-toggle="modal" data-target="#pocket_modal">--}}
    {{--                              <i class="fal fa-plus"></i>--}}
    {{--                          </button>--}}
                          </div>

                      </div>
                      <div class="col-md-6">
                          <div class="single-product-title">
                              <h2>ESPRESSO-BLENDED</h2>
                          </div>
                          <div class="single-product-price">$ 1100 <span style="color: grey;font-size: 16px"><small>Incl. All Taxes</small></span></div>
                          <div class="single-product-desc mb-25">
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                          </div>

                          <form action="{{route('add.to.cart.customization')}}" method="POST">
                                @csrf
                              <input type="hidden" id="collar_name" name="collar_name">
                              <input type="hidden" id="collar_url" name="collar_url">
                              <input type="hidden" id="pocket_name" name="pocket_name">
                              <input type="hidden" id="pocket_url" name="pocket_url">
                              <input type="hidden" id="placket_name" name="placket_name">
                              <input type="hidden" id="placket_url" name="placket_url">
                              <input type="hidden" id="buttons_name" name="buttons_name">
                              <input type="hidden" id="buttons_url" name="buttons_url">
                              <input type="hidden" id="sleeves_name" name="sleeves_name">
                              <input type="hidden" id="sleeves_url" name="sleeves_url">
                              <input type="hidden" id="cuff_name" name="cuff_name">
                              <input type="hidden" id="cuff_url" name="cuff_url">
                              <input type="hidden" id="back_name" name="back_name">
                              <input type="hidden" id="back_url" name="back_url">
                              <input type="hidden" name="product_item_id" value="{{$product->id}}">

                              <button type="submit" class="mt-0 w-50 generic-btn red-hover-btn text-uppercase">
                                  Add To Cart
                              </button>
                          </form>

                      </div>
                  </div>
                </div>

            </div>
        </div>
    </div>

    {{--COller Modal--}}


    <!-- Modal -->
    <div class="modal fade" id="coller_modal" tabindex="-1" role="dialog" aria-labelledby="coller_modalTitle" aria-hidden="true">
        <div class="modal-product-customization-pages modal-dialog modal-dialog-centered" role="document" style="min-width: 85%;
    max-height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Collar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row m-2">
                        <div class="col-md-4" style="position:relative;background: #e1e1e1;border-radius: 8px;">
                            <img id="collar_main_img" style="width: 100%;" src="https://bombayshirts.picarioxpo.com/bsc-bottom.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,,,,&p.c=,,,,,,&p.tr=True,True,True,True,True,True,True,True&p.tr=True,True,True&p.trt=,,,,,90,90,90&p.text=,,,,,,,,,,&p.text.color=,,,,,,,,,,&p.text.font=,,,,,,,,Bell%20MT,Bell%20MT,Bell%20MT&p.text.size=,,,,,,,,250,80,50&p.text.px=,,,,,,,,0.5,0.48,0.60&p.text.py=,,,,,,,,0.3,0.5,0.49&p.text.align=,,,,,,,,1,1,1" alt="">
                            <img id="collar_main_img_particle" style="position: absolute;left: 0%;width: 100%;top: 0;" src="https://bombayshirts.picarioxpo.com/bsc-collar-club.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,d3d3d3,ffffff&p.tr=True,True,True,True,True" alt="">
                            <img style="position: absolute; left: 150px; width: 25%; top: 5px;" src="https://bombayshirts.picarioxpo.com/bsc-zoom-collar-bottom-single-button.pfs?1=1&width=500&p.tn=newbutton_grey.jpg&p.c=,d3d3d3,ffffff&p.tr=True,True" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-club.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,d3d3d3,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/14bc5bdb-2089-fff6-c4b6-12878003b513_Collars-Club.svg?imageTitle=Club%20Collar?imageValue=Club%20Collar" alt="">
                                        <p style="line-height: 1">Spread Collar</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-prince-charile.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,d3d3d3,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/2eb20aaf-8c30-46c6-8a1f-79c531cee4dc_Collars-PrinceCharlie.svg?imageTitle=Prince%20Charlie?imageValue=Prince%20Charlie" alt="">
                                        <p style="line-height: 1">Prince Charlie</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/e234a66f-43a7-6389-671e-5d2854487833_Collars-Bandhgala.svg?imageTitle=Bandhgala?imageValue=Bandhgala" alt="">
                                        <p style="line-height: 1">Bandghala</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-hipster.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/9529ee12-0703-964f-4c84-7a022cd888e6_Collars-Hipster.svg?imageTitle=Hipster?imageValue=Hipster%20Collar" alt="">
                                        <p style="line-height: 1">Hipster</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-hipster-rounded.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/0db1695d-f9d7-09ff-83bc-38e054c77f48_Collars-HipsterRounded.svg?imageTitle=Hipster Rounded?imageValue=Hipster Rounded" alt="">
                                        <p style="line-height: 1">Hipster Round</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-polo.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/d504cd3f-5027-ac05-2a0b-2561fd8583ec_Collars-Polo.svg?imageTitle=Polo?imageValue=Polo Collar" alt="">
                                        <p style="line-height: 1">Polo</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-concealed-polo.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/a7ae42eb-1956-cf82-38bd-8d49c228ef19_Collars-Concealed-Polo.svg?imageTitle=Concealed?imageValue=Concealed" alt="">
                                        <p style="line-height: 1">Concealed</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-club.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/14bc5bdb-2089-fff6-c4b6-12878003b513_Collars-Club.svg?imageTitle=Club Collar?imageValue=Club Collar" alt="">
                                        <p style="line-height: 1">Club Collar</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-madmen.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,d3d3d3,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/1870cb02-8e16-a928-efa3-b43be04a5e0d_Collars-Madmen.svg?imageTitle=Madmen?imageValue=Madmen%20Collar" alt="">
                                        <p style="line-height: 1">Madmen</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css collar_border" onclick="changeCollarImg(this,'https://bombayshirts.picarioxpo.com/bsc-collar-boateng.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True,True,True,True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/fff613f7-9618-8f6e-73a0-1df16db9546e_Collars-Ozwald%20Boateng.svg?imageTitle=Ozwald Boateng?imageValue=Ozwald Boateng" alt="">
                                        <p style="line-height: 1">Ozwald Boateng</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $collar = 'collar';
                @endphp
    {{--            <div class="modal-footer">--}}
    {{--                <input type="hidden" id="collar_src" value="">--}}
    {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="changeMainProductImage(`{{$collar}}`);">Save changes</button>--}}
    {{--            </div>--}}
            </div>
        </div>
    </div>

    {{--COller Modal--}}


    {{--Sleeves Modal--}}


    <!-- Modal -->
    <div class="modal fade" id="sleeves_modal" tabindex="-1" role="dialog" aria-labelledby="coller_modalTitle" aria-hidden="true">
        <div class="modal-product-customization-pages modal-dialog modal-dialog-centered" role="document" style="min-width: 85%;
    max-height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Sleeves</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row m-2">
                        <div class="col-md-4" style="position:relative;background: #e1e1e1;border-radius: 8px;">
                            <img id="sleeves_main_img" style="width: 250px;" src="https://bombayshirts.picarioxpo.com/bsc-bottom.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,,,,&p.c=,,,,,,&p.tr=True,True,True,True,True,True,True,True&p.tr=True,True,True&p.trt=,,,,,90,90,90&p.text=,,,,,,,,,,&p.text.color=,,,,,,,,,,&p.text.font=,,,,,,,,Bell%20MT,Bell%20MT,Bell%20MT&p.text.size=,,,,,,,,250,80,50&p.text.px=,,,,,,,,0.5,0.48,0.60&p.text.py=,,,,,,,,0.3,0.5,0.49&p.text.align=,,,,,,,,1,1,1" alt="">
                            <img id="sleeves_main_img_particle" style="position: absolute;left: 12px;width: 255px;top: 0;" src="https://bombayshirts.picarioxpo.com/bsc-sleeve-long-regular.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,,d3d3d3,ffffff&p.tr=True,True" alt="">
                            <img id="sleeves_cuff_img_particle" style="position: absolute;left: 12px;width: 255px;top: 0;" src="" alt="">
    {{--                        <img style="position: absolute; left: 47%; width: 90px; top: 7px;" src="https://bombayshirts.picarioxpo.com/bsc-zoom-collar-bottom-single-button.pfs?1=1&width=500&p.tn=newbutton_grey.jpg&p.c=,d3d3d3,ffffff&p.tr=True,True" alt="">--}}
                        </div>
                        <div class="col-md-8">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-sleeves-tab" data-toggle="tab" href="#nav-sleeves" role="tab" aria-controls="nav-sleeves" aria-selected="true">Sleeves</a>
                                    <a class="nav-item nav-link" id="nav-cuff-tab" data-toggle="tab" href="#nav-cuff" role="tab" aria-controls="nav-cuff" aria-selected="false">Cuff Style</a>
                                    <a class="nav-item nav-link" id="nav-cuff-stif-tab" data-toggle="tab" href="#nav-cuff-stif" role="tab" aria-controls="nav-cuff-stif" aria-selected="false">Cuff Stiffness</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-sleeves" role="tabpanel" aria-labelledby="nav-sleeves-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <button class="product_option_css sleeves_border" onclick="changeSleevesImg(this,'long','https://bombayshirts.picarioxpo.com/bsc-sleeve-long-regular.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,,d3d3d3,ffffff&p.tr=True,True')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/a5d52c66-8375-ebd0-8ef3-f5dc49e0af21_Full%20Sleeves.svg?imageTitle=Long%20Sleeves?imageValue=Long%20Sleeves" alt="">
                                                <p style="line-height: 1">Long Sleeves</p>
                                            </button>

                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css sleeves_border" onclick="changeSleevesImg(this,'short','https://bombayshirts.picarioxpo.com/bsc-sleeve-half.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,,d3d3d3,ffffff&p.tr=True,True')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/f99c6f00-030d-003b-c785-6a2ebe0e8e9d_Half%20Sleeves.svg?imageTitle=Short%20Sleeves?imageValue=Short%20Sleeves" alt="">
                                                <p style="line-height: 1">Short Sleeves</p>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-cuff" role="tabpanel" aria-labelledby="nav-cuff-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <button class="product_option_css cuff_border" onclick="changeCuffImg(this,'https://bombayshirts.picarioxpo.com/bsc-sleeve-long-regular.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,,000000,ffffff&p.tr=True,True')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/6f0092b8-3165-2160-5232-e72714a58542_Single-convertible.svg?imageTitle=Single Button Cuff?imageValue=Single Button Cuff" alt="">
                                                <p style="line-height: 1">Single Button Cuff</p>
                                            </button>

                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css cuff_border" onclick="changeCuffImg(this,'https://bombayshirts.picarioxpo.com/bsc-cuff-double-button.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,,000000,ffffff,&p.tr=True,True&p.text=,,,,,&p.text.color=,,,,,DD2D28&p.text.font=,,,,,Bell%20MT&p.text.size=,,,,,250&p.text.px=,,,,,0.5&p.text.py=,,,,,0.5&p.text.align=,,,,,1')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/ad91b001-2ea7-073c-8b27-4d188232ccf5_Double-Bond.svg?imageTitle=Double Button Cuff?imageValue=Double Button Cuff" alt="">
                                                <p style="line-height: 1">Double Button Cuff</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css cuff_border" onclick="changeCuffImg(this,'https://bombayshirts.picarioxpo.com/bsc-cuff-neopolitan.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,,000000,ffffff,&p.tr=True,True&p.text=,,,,,&p.text.color=,,,,,DD2D28&p.text.font=,,,,,Bell%20MT&p.text.size=,,,,,250&p.text.px=,,,,,0.5&p.text.py=,,,,,0.5&p.text.align=,,,,,1')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/14eae247-e173-1e91-e29c-1f6b35a068be_The-Neopolitan.svg?imageTitle=Neapolitan%20Cuff?imageValue=Neopolitan%20Cuff" alt="">
                                                <p style="line-height: 1">Neopolitan Cuff</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css cuff_border" onclick="changeCuffImg(this,'https://bombayshirts.picarioxpo.com/bsc-sleeve-long-cuff-french.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,COMSSSO000-13.jpg,COMSSSO000-13.jpg,COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,,,#Buttons#,000000,ffffff,#Buttons#&p.tr=True,True,True&p.text=,,,,,,,,&p.text.color=,,,,,,,transparent&p.text.font=,,,,,,,,Bell%20MT&p.text.size=,,,,,,,,250&p.text.px=,,,,,,,,0.5&p.text.py=,,,,,,,,0.5&p.text.align=,,,,,,,,1')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/e678a6e1-8174-eabe-1fc9-585f9decf5af_The-French%20%281%29.svg?imageTitle=French Cuff?imageValue=French" alt="">
                                                <p style="line-height: 1">French Cuff</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-cuff-stif" role="tabpanel" aria-labelledby="nav--cuff-stif-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <button class="product_option_css">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/e5c82e03-afaa-cdaa-ba48-21b0680e57af_Collars-Stiff.svg?imageTitle=Stiff?imageValue=Stiff" alt="">
                                                <p style="line-height: 1">Stiff</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/e5c82e03-afaa-cdaa-ba48-21b0680e57af_Collars-Stiff.svg?imageTitle=Stiff?imageValue=Stiff" alt="">
                                                <p style="line-height: 1">Soft</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @php
                    $sleeves = 'sleeves';
                @endphp
    {{--            <div class="modal-footer">--}}
    {{--                <input type="hidden" id="sleeves_src" value="">--}}
    {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="changeMainProductImage(`{{$sleeves}}`);">Save changes</button>--}}
    {{--            </div>--}}
            </div>
        </div>
    </div>

    {{--Sleeves Modal--}}



    {{--Pocket Modal--}}


    <!-- Modal -->
    <div class="modal fade" id="pocket_modal" tabindex="-1" role="dialog" aria-labelledby="coller_modalTitle" aria-hidden="true">
        <div class="modal-product-customization-pages modal-dialog modal-dialog-centered" role="document" style="min-width: 85%;
    max-height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Pocket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row m-2">
                        <div class="col-md-4" style="position:relative;background: #e1e1e1;border-radius: 8px;">
                            <img id="pocket_main_img" style="width: 100%;" src="https://bombayshirts.picarioxpo.com/bsc-bottom.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,,,,&p.c=,,,,,,&p.tr=True,True,True,True,True,True,True,True&p.tr=True,True,True&p.trt=,,,,,90,90,90&p.text=,,,,,,,,,,&p.text.color=,,,,,,,,,,&p.text.font=,,,,,,,,Bell%20MT,Bell%20MT,Bell%20MT&p.text.size=,,,,,,,,250,80,50&p.text.px=,,,,,,,,0.5,0.48,0.60&p.text.py=,,,,,,,,0.3,0.5,0.49&p.text.align=,,,,,,,,1,1,1" alt="">
                            <img id="pocket_main_img_particle" style="position: absolute;left: 0%;width: 100%;top: 0;" src="https://bombayshirts.picarioxpo.com/bsc-pocket-single-angled.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,,d3d3d3,ffffff&p.tr=True,True" alt="">
    {{--                        <img style="position: absolute; left: 47%; width: 90px; top: 7px;" src="https://bombayshirts.picarioxpo.com/bsc-zoom-collar-bottom-single-button.pfs?1=1&width=500&p.tn=newbutton_grey.jpg&p.c=,d3d3d3,ffffff&p.tr=True,True" alt="">--}}
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="product_option_css pocket_border" onclick="changePocketImg(this,'')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/79692fc8-b114-2cc4-fffa-b44666476158_Pocket-none.svg?imageTitle=No%20Pocket?imageValue=No%20Pocket" alt="">
                                        <p style="line-height: 1">No Pocket</p>
                                    </button>


                                </div>
                                <div class="col-md-3">
                                    <button class="product_option_css pocket_border" onclick="changePocketImg(this,'https://bombayshirts.picarioxpo.com/bsc-pocket-single-angled.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,newbutton_grey.jpg&p.c=,,,d3d3d3,ffffff&p.tr=True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/3ae3e1c7-2169-2873-0d5d-9c12d1987d35_Pocket-Single-angled.svg?imageTitle=Single%20Pocket?imageValue=Single%20Pocket" alt="">
                                        <p style="line-height: 1">Single Pocket</p>
                                    </button>


                                </div>
                                <div class="col-md-3">
                                    <button class="product_option_css pocket_border" onclick="changePocketImg(this,'https://bombayshirts.picarioxpo.com/bsc-pocket-single-flap.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,,000000,ffffff&p.tr=True,True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/5e280cda-a577-0a6c-031b-cf84394d439f_Pocket-Single%20Flap.svg?imageTitle=Single Pocket with Flap?imageValue=Single Pocket with Flap" alt="">
                                        <p style="line-height: 1">Pocket With Flap</p>
                                    </button>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $sleeves = 'pocket';
                @endphp
    {{--            <div class="modal-footer">--}}
    {{--                <input type="hidden" id="pocket_src" value="">--}}
    {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="changeMainProductImage(`{{$sleeves}}`);">Save changes</button>--}}
    {{--            </div>--}}
            </div>
        </div>
    </div>

    {{--Pocket Modal--}}

    <div class="modal fade" id="placket_modal" tabindex="-1" role="dialog" aria-labelledby="placket_modalTitle" aria-hidden="true">
        <div class="modal-product-customization-pages modal-dialog modal-dialog-centered" role="document" style="min-width: 85%;
    max-height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Placket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row m-2">
                        <div class="col-md-4" style="position:relative;background: #e1e1e1;border-radius: 8px;">
                            <img id="placket_main_img" style="width: 100%;" src="https://bombayshirts.picarioxpo.com/bsc-bottom.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,,,,&p.c=,,,,,,&p.tr=True,True,True,True,True,True,True,True&p.tr=True,True,True&p.trt=,,,,,90,90,90&p.text=,,,,,,,,,,&p.text.color=,,,,,,,,,,&p.text.font=,,,,,,,,Bell%20MT,Bell%20MT,Bell%20MT&p.text.size=,,,,,,,,250,80,50&p.text.px=,,,,,,,,0.5,0.48,0.60&p.text.py=,,,,,,,,0.3,0.5,0.49&p.text.align=,,,,,,,,1,1,1" alt="">
                            <img id="placket_main_img_particle" style="position: absolute;left: 5%;width: 90%;top: 0;" src="https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_black.jpg&p.c=,000000,ffffff&p.tr=True" alt="">
                            {{--                        <img style="position: absolute; left: 47%; width: 90px; top: 7px;" src="https://bombayshirts.picarioxpo.com/bsc-zoom-collar-bottom-single-button.pfs?1=1&width=500&p.tn=newbutton_grey.jpg&p.c=,d3d3d3,ffffff&p.tr=True,True" alt="">--}}
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3">
                                    <button class="product_option_css placket_border" onclick="changePlacketImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_black.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/ae18c4d9-1996-2e99-4273-8939099bdb6d_Front-French.svg?imageTitle=French Placket?imageValue=French Placket" alt="">
                                        <p style="line-height: 1">French Placket</p>
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button class="product_option_css placket_border" onclick="changePlacketImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-concealed.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/139d8b7c-909c-fb83-d497-b75cd328ed11_Front-Concealed.svg?imageTitle=Concealed Placket?imageValue=Concealed Placket" alt="">
                                        <p style="line-height: 1">Concealed Placket</p>
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button class="product_option_css placket_border" onclick="changePlacketImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-regular.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/4cb5f18a-170a-05b7-c117-8e5106128cc3_Front-Regular.svg?imageTitle=Regular Placket?imageValue=Regular Placket" alt="">
                                        <p style="line-height: 1">Regular Placket</p>
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button class="product_option_css placket_border" onclick="changePlacketImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-skinny.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,newbutton_black.jpg&p.c=,,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/a64ee2ee-3b5b-1d31-814b-b7db7bd3be23_Front-Pencil.svg?imageTitle=Skinny Placket?imageValue=Skinny Placket" alt="">
                                        <p style="line-height: 1">Skinny Placket</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $sleeves = 'pocket';
                @endphp
                {{--            <div class="modal-footer">--}}
                {{--                <input type="hidden" id="pocket_src" value="">--}}
                {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="changeMainProductImage(`{{$sleeves}}`);">Save changes</button>--}}
                {{--            </div>--}}
            </div>
        </div>
    </div>



    <div class="modal fade" id="back_modal" tabindex="-1" role="dialog" aria-labelledby="back_modalTitle" aria-hidden="true">
        <div class="modal-product-customization-pages modal-dialog modal-dialog-centered" role="document" style="min-width: 85%;
    max-height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Back</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row m-2">
                        <div class="col-md-4" style="position:relative;background: #e1e1e1;border-radius: 8px;">
                            <img id="" style="width: 100%;" src="https://bombayshirts.picarioxpo.com/bsc-back-base.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg,COMSSSO000-13.jpg,COMSSSO000-13.jpg,COMSSSO000-13.jpg&p.tr=True&p.trt=,,45,135" alt="">
                            <img id="back_main_img" style="position: absolute;left: 5%;width: 90%;top: 0;" src="https://bombayshirts.picarioxpo.com/bsc-back-no-pleats-long.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg&p.tr=True" alt="">
{{--                            <img id="back_main_img" style="position: absolute;left: 5%;width: 90%;top: 0;" src="https://bombayshirts.picarioxpo.com/bsc-back-sleeves-long-regular.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg&p.tr=True" alt="">--}}
                            <img id="placket_main_img_particle" style="position: absolute;left: 5%;width: 90%;top: 0;" src="https://bombayshirts.picarioxpo.com/bsc-back-collar-polo.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg&p.tr=True" alt="">
                            {{--                        <img style="position: absolute; left: 47%; width: 90px; top: 7px;" src="https://bombayshirts.picarioxpo.com/bsc-zoom-collar-bottom-single-button.pfs?1=1&width=500&p.tn=newbutton_grey.jpg&p.c=,d3d3d3,ffffff&p.tr=True,True" alt="">--}}
                        </div>
                        <div class="col-md-8">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-back-tab" data-toggle="tab" href="#nav-back" role="tab" aria-controls="nav-back" aria-selected="true">Back</a>
                                    <a class="nav-item nav-link" id="nav-bottom-tab" data-toggle="tab" href="#nav-bottom" role="tab" aria-controls="nav-bottom" aria-selected="false">Bottom Cut</a>
                                    <a class="nav-item nav-link" id="nav-length-tab" data-toggle="tab" href="#nav-length" role="tab" aria-controls="nav-length" aria-selected="false">Shirt Length</a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-back" role="tabpanel" aria-labelledby="nav-back-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <button class="product_option_css back_border" onclick="changeBackImg(this,'https://bombayshirts.picarioxpo.com/bsc-back-no-pleats-long.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg&p.tr=True')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/e806357d-9064-9320-2e7a-77b5131fc3bc_Back-None.svg?imageTitle=No Pleats?imageValue=No Pleats" alt="">
                                                <p style="line-height: 1">No Pleats</p>
                                            </button>

                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <button class="product_option_css back_border" onclick="changeBackImg(this,'https://bombayshirts.picarioxpo.com/bsc-back-box-pleats-long.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg&p.tr=True')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/55a88402-9aa2-9255-7d76-59e4dac1131b_Back-Box.svg?imageTitle=Box Pleats?imageValue=Box Pleats" alt="">
                                                <p style="line-height: 1">Box Pleats</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <button class="product_option_css back_border" onclick="changeBackImg(this,'https://bombayshirts.picarioxpo.com/bsc-back-side-pleats-long.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg&p.tr=True')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/5e8c228b-594e-f28d-b50c-38b56341fbc6_Back-Side.svg?imageTitle=Side Pleats?imageValue=Side Pleats" alt="">
                                                <p style="line-height: 1">Side Pleats</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <button class="product_option_css back_border" onclick="changeBackImg(this,'https://bombayshirts.picarioxpo.com/bsc-back-darts-long.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg&p.tr=True')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/821c902b-1103-86b6-8f26-daa0d7f91598_Back-Darts.svg?imageTitle=Darts?imageValue=Darts" alt="">
                                                <p style="line-height: 1">Darts</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3 mb-2">
                                            <button class="product_option_css back_border" onclick="changeBackImg(this,'https://bombayshirts.picarioxpo.com/bsc-back-deep-darts-long.pfs?1=1&width=500&p.tn=COMSSSO000-13.jpg&p.tr=True')">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/87d24446-27b8-9040-7f4f-8285c07c469c_Back-Deep-Darts.svg?imageTitle=Deep Darts?imageValue=Deep Darts" alt="">
                                                <p style="line-height: 1">Deep Darts</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-bottom" role="tabpanel" aria-labelledby="nav-bottom-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <button class="product_option_css">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/64cb7c00-dbbe-407b-5703-7c4c15546781_Rounded%20-%20BottomCut-03%20copy-01.svg?imageTitle=Round?imageValue=Round" alt="">
                                                <p style="line-height: 1">Round</p>
                                            </button>

                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css" >
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/489b4156-d48e-d3d5-4253-8904a7f7545e_Tail%20-%20BottomCut-04%20copy-01.svg?imageTitle=Tail?imageValue=Tail" alt="">
                                                <p style="line-height: 1">Tail</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css" >
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/e5503912-8947-1d5b-ba0e-b7b0b7bfb4c7_Straight%20with%20slits%20-%20BottomCut-01%20copy-01%20%281%29.svg?imageTitle=Straight - with slits?imageValue=Straight - with slits" alt="">
                                                <p style="line-height: 1">Straight - with slits</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css" >
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/1ba9f411-83ae-356b-b13d-d90b6ca01032_Straight%20without%20slits%20-%20BottomCut-02%20copy-01%20%281%29.svg?imageTitle=Straight - without slits?imageValue=Straight - without slits" alt="">
                                                <p style="line-height: 1">Straight - without slits</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-length" role="tabpanel" aria-labelledby="nav-length-tab">
                                    <div class="row mt-3">
                                        <div class="col-md-3">
                                            <button class="product_option_css">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/6c7f3caa-355b-e611-2c7d-3abaa91e6382_Formal%20Length-02%20%281%29.svg?imageTitle=Formal?imageValue=Formal" alt="">
                                                <p style="line-height: 1">Formal</p>
                                            </button>
                                        </div>
                                        <div class="col-md-3">
                                            <button class="product_option_css">
                                                <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/d8470e7a-da73-b8c3-b648-f3ffb5391249_Short%20Length-01%20%281%29.svg?imageTitle=Casual?imageValue=Casual" alt="">
                                                <p style="line-height: 1">Casual</p>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @php
                    $sleeves = 'pocket';
                @endphp
                {{--            <div class="modal-footer">--}}
                {{--                <input type="hidden" id="pocket_src" value="">--}}
                {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                {{--                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="changeMainProductImage(`{{$sleeves}}`);">Save changes</button>--}}
                {{--            </div>--}}
            </div>
        </div>
    </div>


    {{--    Product Customiation Page --}}
    {{--Buttons Modal--}}
    <div class="modal fade" id="button_modal" tabindex="-1" role="dialog" aria-labelledby="coller_modalTitle" aria-hidden="true">
        <div class="modal-product-customization-pages modal-dialog modal-dialog-centered" role="document" style="min-width: 85%;
    max-height: 100%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Select Button Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row m-2">
                        <div class="col-md-4" style="position:relative;background: #e1e1e1;border-radius: 8px;">
                            <img id="button_main_img" style="width: 100%;" src="https://bombayshirts.picarioxpo.com/bsc-bottom.pfs?1=1&width=500&p.tn=CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,CORPSAO001-13.jpg,,,,&p.c=,,,,,,&p.tr=True,True,True,True,True,True,True,True&p.tr=True,True,True&p.trt=,,,,,90,90,90&p.text=,,,,,,,,,,&p.text.color=,,,,,,,,,,&p.text.font=,,,,,,,,Bell%20MT,Bell%20MT,Bell%20MT&p.text.size=,,,,,,,,250,80,50&p.text.px=,,,,,,,,0.5,0.48,0.60&p.text.py=,,,,,,,,0.3,0.5,0.49&p.text.align=,,,,,,,,1,1,1" alt="">
                            <img id="button_main_img_particle" style="position: absolute;left: 5%;width: 90%;top: 0;" src="https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_black.jpg&p.c=,d3d3d3,ffffff&p.tr=True" alt="">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_black.jpg&p.c=,d3d3d3,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/a0cfbaf6-8778-8385-2695-061febaeff1c_black.jpg?imageTitle=Black?imageValue=newbutton_black" alt="">
                                        <p style="line-height: 1">Black</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_natural.jpg&p.c=,d3d3d3,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/2dc23b68-a01e-502b-a7e9-40b16262b4dd_natural.jpg?imageTitle=Natural?imageValue=newbutton_natural" alt="">
                                        <p style="line-height: 1">Natural</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_grey.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/59ddce24-75fa-69d2-d67e-70b800513e5d_grey.jpg?imageTitle=Grey?imageValue=newbutton_grey" alt="">
                                        <p style="line-height: 1">Grey</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_maroon.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/0dcfddf7-8ce2-3008-fe4f-190682d6d227_maroon.jpg?imageTitle=Maroon?imageValue=newbutton_maroon" alt="">
                                        <p style="line-height: 1">Maroon</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_blue.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagestage-stage.s3.ap-south-1.amazonaws.com/public/attributes/badde3dd-8cb1-c1c8-47ad-8f5d6463eb88_blue.jpg?imageTitle=Blue?imageValue=newbutton_blue" alt="">
                                        <p style="line-height: 1">Blue</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_horn.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/94528617-3629-bf95-a8d3-08c5850cad7f_horn.jpg?imageTitle=Horn?imageValue=newbutton_horn" alt="">
                                        <p style="line-height: 1">Horn</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_vintage.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/9eda6fe9-a800-c610-365b-20b1179ce9a8_vintage.jpg?imageTitle=Vintage?imageValue=newbutton_vintage" alt="">
                                        <p style="line-height: 1">Vintage</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_brown.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/4586a184-3845-a41e-4516-c8113bc31a1f_brown.png?imageTitle=Brown?imageValue=newbutton_brown" alt="">
                                        <p style="line-height: 1">Brown</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_pink.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/9569c50e-ec5e-b281-e5f5-df33fe112e56_pink.jpg?imageTitle=Pink?imageValue=newbutton_pink" alt="">
                                        <p style="line-height: 1">Pink</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_wood.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/75ecb4ae-cee6-07ab-9072-880aaddce9be_wood.jpg?imageTitle=Wood?imageValue=newbutton_wood" alt="">
                                        <p style="line-height: 1">Wood</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_jetblack.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/2caae5ae-e2fa-3ced-6a6f-8c8a68b042b8_1.jpg?imageTitle=Jet Black?imageValue=newbutton_jetblack" alt="">
                                        <p style="line-height: 1">Jet Black</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_saddle.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/2fb4edb6-c9c4-6d9b-7784-97ef785e31ba_2%20%281%29.jpg?imageTitle=Saddle?imageValue=newbutton_saddle" alt="">
                                        <p style="line-height: 1">Saddle</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=newbutton_eclipse.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/a1339cde-5eed-b842-3840-5402b370b007_3.jpg?imageTitle=Eclipse?imageValue=newbutton_eclipse" alt="">
                                        <p style="line-height: 1">Eclipse</p>
                                    </button>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <button class="product_option_css button_border" onclick="changeButtonImg(this,'https://bombayshirts.picarioxpo.com/bsc-placket-french.pfs?1=1&width=500&p.tn=MOP - White.jpg&p.c=,000000,ffffff&p.tr=True')">
                                        <img src="https://bsc-admin-productimagemaster-master.s3.ap-south-1.amazonaws.com/public/attributes/9cdf3144-b04d-956d-7fe0-b7f25dcac543_Mother%20of%20Pearl%20.png?imageTitle=MOP - White?imageValue=MOP - White" alt="">
                                        <p style="line-height: 1">MOP - White</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    $button = 'button';
                @endphp
    {{--            <div class="modal-footer">--}}
    {{--                <input type="hidden" id="button_src" value="">--}}
    {{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
    {{--                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="changeMainProductImage(`{{$button}}`);">Save changes</button>--}}
    {{--            </div>--}}
            </div>
        </div>
    </div>

    {{--Buttons Modal--}}
    <script>



        // buttons_name
        // buttons_url
        // back_name
        // back_url

        function changeCollarImg(ref,e) {
            // console.log(ref.children[1].textContent)

            let collar_name = document.getElementById('collar_name');
            let collar_url = document.getElementById('collar_url');

            collar_name.value = e
            collar_url.value = ref.children[1].textContent

            let collar_main_img_particle = document.getElementById('collar_main_img_particle');
            let product_main_image_collar = document.getElementById('product_main_image_collar');
            // let collar_src = document.getElementById('collar_src');
            collar_main_img_particle.src = e;
            product_main_image_collar.src = e;
            product_main_image_collar.style.top = '0%';
            product_main_image_collar.style.left = '0%';
            product_main_image_collar.style.width = '100%';
            $('.collar_btn').css('background', '#187f30')

            let myColor = document.querySelectorAll('.collar_border');
            myColor.forEach(function (button) {
                button.style.border = '1px solid grey';
            });

            // Add border to the selected button
            ref.style.border = '3px solid #a68214';
            // collar_src.value = e;
        }
        function changeSleevesImg(ref,type,e) {

            let sleeves_name = document.getElementById('sleeves_name');
            let sleeves_url = document.getElementById('sleeves_url');
            let cuff_name = document.getElementById('cuff_name');
            let cuff_url = document.getElementById('cuff_url');

            sleeves_name.value = e
            sleeves_url.value = ref.children[1].textContent

            if(type == 'short') {
                $('#nav-cuff-tab').css('display', 'none')
                $('#nav-cuff-stif-tab').css('display', 'none')
                $('#sleeves_cuff_img_particle').css('display', 'none')
                $('#product_main_image_cuff').css('display', 'none')


                cuff_name.value = ''
                cuff_url.value = ''
            }
            else if(type == 'long') {
                $('#nav-cuff-tab').css('display', 'block')
                $('#nav-cuff-stif-tab').css('display', 'block')
                $('#sleeves_cuff_img_particle').css('display', 'block')
                $('#product_main_image_cuff').css('display', 'block')
            }

            let sleeves_main_img_particle = document.getElementById('sleeves_main_img_particle');
            let product_main_image_sleeves = document.getElementById('product_main_image_sleeves');
            // let sleeves_src = document.getElementById('sleeves_src');
            sleeves_main_img_particle.src = e;
            product_main_image_sleeves.src = e;
            product_main_image_sleeves.style.top = '0%';
            product_main_image_sleeves.style.left = '0%';
            product_main_image_sleeves.style.width = '100%';
            // console.log(collar_main_img.src)
            $('.sleeves_btn').css('background', '#187f30')

            let myColor = document.querySelectorAll('.sleeves_border');
            myColor.forEach(function (button) {
                button.style.border = '1px solid grey';
            });

            // Add border to the selected button
            ref.style.border = '3px solid #a68214';

        }
        function changeBackImg(ref,e) {


            let back_name = document.getElementById('back_name');
            let back_url = document.getElementById('back_url');

            back_name.value = e
            back_url.value = ref.children[1].textContent

            let back_main_img = document.getElementById('back_main_img');
            back_main_img.src = e;
            $('.back_btn').css('background', '#187f30')


            let myColor = document.querySelectorAll('.back_border');
            myColor.forEach(function (button) {
                button.style.border = '1px solid grey';
            });

            // Add border to the selected button
            ref.style.border = '3px solid #a68214';
        }
        // sleeves_cuff_img_particle
        function changeCuffImg(ref,e) {


            // cuff_name
            // cuff_url
            let cuff_name = document.getElementById('cuff_name');
            let cuff_url = document.getElementById('cuff_url');

            cuff_name.value = e
            cuff_url.value = ref.children[1].textContent

            let sleeves_cuff_img_particle = document.getElementById('sleeves_cuff_img_particle');
            let product_main_image_cuff = document.getElementById('product_main_image_cuff');
            sleeves_cuff_img_particle.src = e;

            product_main_image_cuff.src = e;
            product_main_image_cuff.style.top = '0%';
            product_main_image_cuff.style.left = '0%';
            product_main_image_cuff.style.width = '100%';
            // console.log(collar_main_img.src)
            $('.sleeves_btn').css('background', '#187f30')

            let myColor = document.querySelectorAll('.cuff_border');
            myColor.forEach(function (button) {
                button.style.border = '1px solid grey';
            });

            // Add border to the selected button
            ref.style.border = '3px solid #a68214';



        }

        function changePocketImg(ref,e) {

            let pocket_name = document.getElementById('pocket_name');
            let pocket_url = document.getElementById('pocket_url');

            pocket_name.value = e
            pocket_url.value = ref.children[1].textContent

            let pocket_main_img_particle = document.getElementById('pocket_main_img_particle');
            let product_main_image_pocket = document.getElementById('product_main_image_pocket');
            // let sleeves_src = document.getElementById('sleeves_src');
            pocket_main_img_particle.src = e;
            product_main_image_pocket.src = e;
            product_main_image_pocket.style.top = '0%';
            product_main_image_pocket.style.left = '0%';
            product_main_image_pocket.style.width = '100%';
            $('.pocket_btn').css('background', '#187f30')

            let myColor = document.querySelectorAll('.pocket_border');
            myColor.forEach(function (button) {
                button.style.border = '1px solid grey';
            });

            // Add border to the selected button
            ref.style.border = '3px solid #a68214';


        }
        function changePlacketImg(ref,e) {


            let placket_name = document.getElementById('placket_name');
            let placket_url = document.getElementById('placket_url');

            placket_name.value = e
            placket_url.value = ref.children[1].textContent

            let placket_main_img_particle = document.getElementById('placket_main_img_particle');
            let product_main_image_pocket = document.getElementById('product_main_image_pocket');
            // let sleeves_src = document.getElementById('sleeves_src');
            placket_main_img_particle.src = e;
            product_main_image_pocket.src = e;
            product_main_image_pocket.style.top = '0%';
            product_main_image_pocket.style.left = '0%';
            product_main_image_pocket.style.width = '100%';
            $('.placket_btn').css('background', '#187f30')

            let myColor = document.querySelectorAll('.placket_border');
            myColor.forEach(function (button) {
                button.style.border = '1px solid grey';
            });

            // Add border to the selected button
            ref.style.border = '3px solid #a68214';


        }
        // pocket_main_img_particle
        function changeButtonImg(ref,e) {


            let buttons_name = document.getElementById('buttons_name');
            let buttons_url = document.getElementById('buttons_url');

            buttons_name.value = e
            buttons_url.value = ref.children[1].textContent


            let button_main_img_particle = document.getElementById('button_main_img_particle');
            let product_main_image_button = document.getElementById('product_main_image_button');
            // let sleeves_src = document.getElementById('sleeves_src');
            button_main_img_particle.src = e;
            product_main_image_button.src = e;
            product_main_image_button.style.top = '0%';
            product_main_image_button.style.left = '0%';
            product_main_image_button.style.width = '100%';
            // console.log(collar_main_img.src)
            $('.buttons_btn').css('background', '#187f30')

            let myColor = document.querySelectorAll('.button_border');
            myColor.forEach(function (button) {
                button.style.border = '1px solid grey';
            });

            // Add border to the selected button
            ref.style.border = '3px solid #a68214';


        }

        function changeMainProductImage(e){
            // console.log(e)
            // if(e == 'collar') {
            //     let inputValue = document.getElementById("collar_src").value;
            //     let product_main_image = document.getElementById('product_main_image');
            //     product_main_image.src = inputValue;
            // }
            // else if(e == 'sleeves') {
            //     let inputValue = document.getElementById("sleeves_src").value;
            //     let product_main_image = document.getElementById('product_main_image');
            //     product_main_image.src = inputValue;
            // }
            //
            // else if(e == 'pocket') {
            //     let inputValue = document.getElementById("pocket_src").value;
            //     let product_main_image = document.getElementById('product_main_image');
            //     product_main_image.src = inputValue;
            // }
            // else if(e == 'button') {
            //     let inputValue = document.getElementById("button_src").value;
            //     let product_main_image = document.getElementById('product_main_image');
            //     product_main_image.src = inputValue;
            // }
        }

        function previewShirt(checked) {
            if (checked) {
                // alert("1"); // Checkbox is checked, so display "1"
                $('.collar-div').css('display', 'none')
                $('.sleeves-div').css('display', 'none')
                $('.pocket-div').css('display', 'none')
                $('.buttons-div').css('display', 'none')
                $('.placket-div').css('display', 'none')
                $('.back-div').css('display', 'none')
            } else {
                // alert("0"); // Checkbox is not checked, so display "0"
                $('.collar-div').css('display', 'block')
                $('.sleeves-div').css('display', 'block')
                $('.pocket-div').css('display', 'block')
                $('.buttons-div').css('display', 'block')
                $('.placket-div').css('display', 'block')
                $('.back-div').css('display', 'block')
            }
        }

    </script>
    @endsection
