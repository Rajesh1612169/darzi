@extends('frontend.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row mt-5" style="
    /*border: 1px solid #dca72a;*/
        background: #fafafa;
        padding: 30px 10px;
        border-radius: 20px;
          box-shadow: 0px 0px 10px 0px #dca72a;
        ">
            <div class="col-md-3">
                @include('frontend.components.sidebar')
            </div>
            <div class="col-md-9">
                <button type="button"  class="generic-btn mb-3 red-hover-btn text-uppercase float-right btn-sm" data-toggle="modal" data-target="#exampleModalRight">
                    Create New Size
                </button>
            <h4>My Size</h4>
            <div class="table-content table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="product-thumbnail">ID</th>
                        <th class="product-thumbnail">Size For</th>
                        <th class="product-thumbnail">Body Type</th>
                        <th class="product-thumbnail">Height</th>
                        <th class="cart-product-name">Size</th>
                        <th class="product-price">Type</th>
                        <th class="cart-product-name">Fit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($my_sizes as $item)
{{--                        @php--}}
{{--                            $my_order_products = DB::table('new_products as pr')--}}
{{--                               ->leftJoin('product_images as pi', 'pi.product_id', '=', 'pr.id')--}}
{{--                               ->get();--}}

{{--                        @endphp--}}
                        <tr>
                            <td>{{ $item->id }}</td>
{{--                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-M-Y') }}</td>--}}
                            <td>{{ $item->size_for }}</td>
                            <td>{{ $item->body_type }}</td>
                            <td>{{ $item->height }}</td>
                            <td>{{ $item->size }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->fit }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
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
                        <p class="">Size for</p>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="size_for" placeholder="Size For" required>
                            </div>
                        </div>
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

@endsection
