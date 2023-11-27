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
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active show">
                    <h4>Profile</h4>
                    <div class="row">
                        <div class="col-md-12">
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
                                            <label class="form-label" for="phone_no">Cell No</label>
                                            <input type="text" id="phone_no" name="phone_no" value="{{$profile->phone_no}}" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="generic-btn red-hover-btn text-uppercase float-right">Update</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


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
