@extends('frontend.layouts.app')
@section('content')
    {{--{{dd($categories)}}--}}
    <!-- banner-1 section start -->
@php
    $product_categories = \Illuminate\Support\Facades\DB::table('product_category')->get();
    $product_variation_options = \Illuminate\Support\Facades\DB::table('product_variation_options')->where('variation_id', '=', 3)->get();
        $product_variation_codes = \Illuminate\Support\Facades\DB::table('product_variation_options')->whereIn('variation_id', [4,5])->get();

@endphp
    <style>

        .wrapper {
            /*width: 400px;*/
            /*background: #fff;*/
            border-radius: 10px;
            /*padding: 20px 25px 40px;*/
            /*box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);*/
        }
        header h2 {
            font-size: 24px;
            font-weight: 600;
        }
        header p {
            margin-top: 5px;
            font-size: 16px;
        }
        .price-input {
            width: 100%;
            display: flex;
            margin: 30px 0 35px;
        }
        .price-input .field {
            display: flex;
            width: 100%;
            height: 45px;
            align-items: center;
        }
        .field input {
            width: 100%;
            height: 100%;
            outline: none;
            font-size: 19px;
            margin-left: 12px;
            border-radius: 5px;
            text-align: center;
            border: 1px solid #999;
            -moz-appearance: textfield;
        }
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
        .price-input .separator {
            width: 130px;
            display: flex;
            font-size: 19px;
            align-items: center;
            justify-content: center;
        }
        .slider {
            height: 5px;
            position: relative;
            background: #ddd;
            border-radius: 5px;
        }
        .slider .progress {
            height: 100%;
            left: 25%;
            right: 25%;
            position: absolute;
            border-radius: 5px;
            background: #17a2b8;
        }
        .range-input {
            position: relative;
        }
        .range-input input {
            position: absolute;
            width: 100%;
            height: 5px;
            top: -5px;
            background: none;
            pointer-events: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }
        input[type="range"]::-webkit-slider-thumb {
            height: 17px;
            width: 17px;
            border-radius: 50%;
            background: #17a2b8;
            pointer-events: auto;
            -webkit-appearance: none;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
        }
        input[type="range"]::-moz-range-thumb {
            height: 17px;
            width: 17px;
            border: none;
            border-radius: 50%;
            background: #17a2b8;
            pointer-events: auto;
            -moz-appearance: none;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
        }

        /* Support */
        .support-box {
            top: 2rem;
            position: relative;
            bottom: 0;
            text-align: center;
            display: block;
        }
        .b-btn {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .b-btn.paypal i {
            color: blue;
        }
        .b-btn:hover {
            text-decoration: none;
            font-weight: bold;
        }
        .b-btn i {
            font-size: 20px;
            color: yellow;
            margin-top: 2rem;
        }


        #loaders {
            display: none;
        }
    </style>
<div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
            <!-- widget -->
            <div class="widget">
                <h4 class="mb-30">Product Categories</h4>
                <div class="accordion" id="accordionExample">
                    @foreach($product_categories as $key=>$item)
                    <div class="list d-flex">
                        <input type="checkbox" name="category_id" id="cat_{{$item->id}}" onchange="searchFilter()" value="{{$item->id}}" {{isset($_GET['category_id']) && $_GET['category_id'] == $item->id ? 'checked' : ''}}>
                        <label for="cat_{{$item->id}}" style=" margin-top: 5px; margin-left: 5px" href="{{route('shop.index')}}?category_id={{$item->id}}">{{$item->category_name}} <span></span></label>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="widget">
                <h4 class="mb-30">Product Size</h4>
                <div class="accordion" id="accordionExample">
                    @foreach($product_variation_options as $key=>$item)
                        <div class="list d-flex">
                            <input type="checkbox" id="var_{{$item->id}}" name="variation_option_id" onchange="searchFilter()" value="{{$item->id}}">
                            <label for="var_{{$item->id}}" style=" margin-top: 5px; margin-left: 5px" href="{{route('shop.index')}}?category_id={{$item->id}}">{{$item->variation_option_name}} <span></span></label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="widget">
                <h4 class="mb-30">Product Colour</h4>
                <div class="accordion" id="accordionExample">
                    @php
                        $colorNames = array(
          'Black',
        'White',
          'Red',
          'Green',
          'Blue',
          // Add more color names and hex values as needed
      );
                    @endphp
                    @foreach($product_variation_codes as $key=>$item)
                        <div class="list d-flex">
                            <input type="checkbox" id="col_{{$item->id}}" name="variation_option_col_id" onchange="searchFilter()" value="{{$item->id}}">
                            <label for="var_{{$item->id}}" style=" margin-top: 5px; margin-left: 5px" href="{{route('shop.index')}}?category_id={{$item->id}}">{{$colorNames[$key]}} <span></span></label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="widget mt-50">
                <h4 class="mb-30">Filter By Price</h4>
                <div class="wrapper">
                    <div class="price-input">
                        <div class="field">
                            <span>Min</span>
                            <input type="number" name="input-min" class="input-min" value="0" onchange="searchFilter()">
                        </div>
                        <div class="separator">-</div>
                        <div class="field">
                            <span>Max</span>
                            <input type="number" name="input-max" class="input-max" value="7500" onchange="searchFilter()">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <form action="{{route('shop.index')}}" method="GET">
                    <div class="range-input">
                        <input type="range" class="range-min" id="range-min" name="range-min" min="0" max="10000" value="0" step="50" onchange="searchFilter()">
                        <input type="range" class="range-max" id="range-max" name="range-max" min="0" max="10000" value="7500" step="50" onchange="searchFilter()">
                    </div>
{{--                    <div>--}}
{{--                        <button type="submit" class="generic-btn mt-4 float-right mb-4 red-hover-btn text-uppercase" tabindex="0">--}}
{{--                            Apply Filter--}}
{{--                        </button>--}}
{{--                    </div>--}}
                    </form>
                </div>
            </div>
{{--            <div class="widget mt-50">--}}
{{--                <h4 class="mb-30">Filter By Color</h4>--}}
{{--                <ul class="color-list">--}}
{{--                    <li style="background-color: #000;"></li>--}}
{{--                    <li style="background-color: #1E73BE;"></li>--}}
{{--                    <li style="background-color: #FFD700;"></li>--}}
{{--                    <li style="background-color: #C9C9C9;"></li>--}}
{{--                    <li style="background-color: #008000;"></li>--}}
{{--                    <li style="background-color: #FFFF00;"></li>--}}
{{--                    <li style="background-color: #FFFFFF;"></li>--}}
{{--                    <li style="background-color: #DD3333;"></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="widget mt-50">--}}
{{--                <h4 class="mb-30">Filter By Size</h4>--}}
{{--                <div class="size-link">--}}
{{--                    <a href="shop2.html">3xl</a>--}}
{{--                    <a href="shop2.html">l</a>--}}
{{--                    <a href="shop2.html">m</a>--}}
{{--                    <a href="shop2.html">s</a>--}}
{{--                    <a href="shop2.html">xl</a>--}}
{{--                    <a href="shop2.html">xxl</a>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="widget mt-50">
                <h4 class="mb-30">Featured</h4>
                <div class="post-box">
                    <ul>
                        @foreach($featured_products as $item)
{{--                            {{dd($item)}}--}}
                            @php

                                $images = json_decode($item->product_images);
                                //dd($images[0]);
                            @endphp
                        <li>
                            <div class="post-img">
                                <img src="{{asset('product_images/'.$images[0])}}" class="w-100" alt="">
                            </div>
                            <div class="post-img-desc">
                                <a href="{{route('product.details', $item->id)}}">{{$item->product_name}}</a>
                                <div class="price">${{$item->price}}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
{{--            <div class="widget mt-50">--}}
{{--                <h4 class="mb-30">Popular Tags</h4>--}}
{{--                <div class="category-list">--}}
{{--                    <ul>--}}
{{--                        <li><a href="shop2.html">Accessories</a></li>--}}
{{--                        <li><a href="shop2.html">Clothing</a></li>--}}
{{--                        <li><a href="shop2.html">fashion</a></li>--}}
{{--                        <li><a href="shop2.html">Fly</a></li>--}}
{{--                        <li><a href="shop2.html">Glasses</a></li>--}}
{{--                        <li><a href="shop2.html">men</a></li>--}}
{{--                        <li><a href="shop2.html">Product</a></li>--}}
{{--                        <li><a href="shop2.html">version</a></li>--}}
{{--                        <li><a href="shop2.html">women</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <div class="col-md-9">
            <div class="row" id="loaders">
                <div class="col-md-12 text-center" style="margin-top: 100px">
                    <h5 >Loading...</h5>
                </div>
            </div>
            <div class="row" id="row_items">
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
                                        <a href="{{route('add.to.whishlist',['product_id' => $item->id])}}" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-4.html" class="product-title">{{$item->product_name}}</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">${{$item->price}}</span>
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
    <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });


        function searchFilter (){
            $('#row_items').html('')
            let categoryCheckboxes = document.getElementsByName("category_id");
            let variationCheckboxes = document.getElementsByName("variation_option_id");
            let variationColorCheckboxes = document.getElementsByName("variation_option_col_id");
            let row_items = document.getElementsByName("row_items");
            let range_min = document.getElementById("range-min");
            let range_max = document.getElementById("range-max");

            range_min = range_min.value;
            range_max = range_max.value;

            let categoryCheckedValues = [];

            for (let i = 0; i < categoryCheckboxes.length; i++) {
                if (categoryCheckboxes[i].checked) {
                    categoryCheckedValues.push(categoryCheckboxes[i].value);
                }
            }

            let variationCheckboxValues = [];

            for (let i = 0; i < variationCheckboxes.length; i++) {
                if (variationCheckboxes[i].checked) {
                    variationCheckboxValues.push(variationCheckboxes[i].value);
                }
            }


            let variationColorCheckboxesValues = [];

            for (let i = 0; i < variationColorCheckboxes.length; i++) {
                if (variationColorCheckboxes[i].checked) {
                    variationColorCheckboxesValues.push(variationColorCheckboxes[i].value);
                }
            }



            // console.log(categoryCheckedValues)
            // console.log(variationCheckboxValues)
            // console.log(range_min)
            // console.log(range_max)

            $.ajax({
                type: "GET",
                url: '{{route('shopFilters')}}',
                data: {
                    categoryCheckedValues: categoryCheckedValues,
                    variationCheckboxValues: variationCheckboxValues,
                    variationColorCheckboxesValues: variationColorCheckboxesValues,
                    range_min: range_min,
                    range_max: range_max
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    // Show the loader
                    $('#loaders').show();
                },
                // dataType: json,
                success: function(res){
                    console.log(res)
                    if(res ==='' || res === null) {
                        $('#row_items').append(
                            '<div class="col-md-12 text-center " style="margin-top: 100px"><h5>No product available</h5></div>'
                        )
                    }
                    else {
                        $('#row_items').append(res)
                    }

                    // window.location.reload()
                },
                error: function(err){
                    console.log(err);
                },
                complete: function() {
                    // Hide the loader
                    $('#loaders').hide();
                }
            });

            // return ;
        }
        searchFilter()

        // window.onload(function () {
        // })

    </script>
@endsection
