@extends('frontend.layouts.app')
@section('content')
    <div class="row m-3 mt-5">
   <div class="col-md-3">
    @include('frontend.components.sidebar')
   </div>
    <div class="col-md-9">
        <div class="table-content table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="cart-product-name">Product</th>
                    <th class="product-price">Unit Price</th>
                    <th class="product-remove">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($whishlist as $item)
                    @php
                    //dd($item);
                        $images = json_decode($item->product_images);
                    @endphp
                    <tr>
                        <td class="product-thumbnail"><a href="single-product-4.html"><img src="{{asset('product_images/'.$images[0])}}" alt=""></a></td>
                        <td class="product-name"><a href="{{route('product.details', $item->product_id)}}">{{$item->product_name}}</a></td>
                        <td class="product-price"><span class="amount">${{$item->price}}</span></td>
                        <td class="product-remove">
                            <div class="d-flex">
                                <a class="btn theme-btn-2 mb-1" href="{{route('delete.whishlist.item', ['id' => $item->id,'product_id' => $item->product_id])}}"><i class="fa fa-times"></i></a>
                                <form class="w-100" action="{{route('add.to.cart')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_item_id" value="{{$item->product_id}}">

                                    <button class="btn theme-btn-2" type="submit">Add TO Cart</button>
                                </form>
                            </div>


                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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

@endsection
