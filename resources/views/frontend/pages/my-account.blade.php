@extends('frontend.layouts.app')
@section('content')

    @include('frontend.components.sidebar')
    <div class="col-md-10">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h2>Home</h2>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h4>Profile</h4>
                <div class="row">
                    <div class="col-md-10">
                        <form method="post" action="{{route('profile.update')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="name">Full Name</label>
                                        <input type="text" id="name" name="name" value="{{$profile->name}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email address</label>
                                        <input type="email" id="email" name="email" value="{{$profile->email}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="phone_no">Email address</label>
                                        <input type="text" id="phone_no" name="phone_no" value="{{$profile->phone_no}}" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="address">Permanent address</label>
                                        <input type="text" id="address" name="address" value="{{$profile->address}}" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="generic-btn red-hover-btn text-uppercase float-right">Submit</button>
                        </form>
                    </div>
{{--                    <div class="col-md-10">--}}

{{--                        <form method="post" action="{{route('pd.login.post')}}">--}}
{{--                            @csrf--}}
{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-outline mb-4">--}}
{{--                                    <label class="form-label" for="address">Email address</label>--}}
{{--                                    <input type="text" id="address" name="address" value="{{$profile->email}}" class="form-control" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button type="submit" class="generic-btn red-hover-btn text-uppercase float-right">Submit</button>--}}

{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="tab-pane fade" id="whishlist" role="tabpanel" aria-labelledby="whishlist-tab">
                <div class="table-content table-responsive">
                    <table class="table w-75">
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
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <h2>Contact</h2>
            </div>
        </div>
    </div>
    <!-- /.col-md-8 -->
    </div>



    </div>
    <!-- /.container -->

@endsection
