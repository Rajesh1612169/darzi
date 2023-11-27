@extends('frontend.layouts.app')
@section('content')
   <!-- contact-area start -->
   <section class="contact-area pb-30" data-background="assets/img/bg/bg-map.png">
    <div class="has-breadcrumb-bg mb-120" style="background-image: url('{{asset('frontend/img/banner/banner111.webp')}}');background-size: contain!important;">
        <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
         <h2 class="title" style="color:white!important">Contact</h2>
         <nav aria-label="breadcrumb" class="mb-40">
             <ol class="breadcrumb p-0 m-0">
                 <li class="breadcrumb-item"><a href="{{route('home.index')}}" style="color:white!important">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page" style="color:white!important">Contact</li>
             </ol>
         </nav>
        </div>
     </div>
    <div class="container container-1430">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="contact text-center mb-30">
                    <i class="fas fa-envelope"></i>
                    <h3>Mail Here</h3>
                    <p>Admin@BasicTheme.com</p>
                    <p>Info@Themepur.com</p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="contact text-center mb-30">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Visit Here</h3>
                    <p>27 Division St, New York, NY 10002,
                        Jaklina, United Kingpung</p>
                </div>
            </div>
            <div class="col-xl-4  col-lg-4 col-md-4 ">
                <div class="contact text-center mb-30">
                    <i class="fas fa-phone"></i>
                    <h3>Call Here</h3>
                    <p>+8 (123) 985 789</p>
                    <p>+787 878897 87</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area end -->

<!-- contact-form-area start -->
<section class="contact-form-area grey-bg pt-100 pb-100">
    <div class="container container-1430">
        <div class="form-wrapper">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title mb-55">
                        <p><span></span> Anything On your Mind</p>
                        <h1>Estimate Your Idea</h1>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-3 d-none d-xl-block ">
                    <div class="section-link mb-80 text-right">
                        <a class="generic-btn red-hover-btn text-uppercase" href="tel:+8123985789"><i class="fas fa-phone"></i> make call</a>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form id="contact-form" action="#">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-box user-icon mb-30">
                                <input type="text" name="name" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-box email-icon mb-30">
                                <input type="text" name="email" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-box phone-icon mb-30">
                                <input type="text" name="phone" placeholder="Your Phone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-box subject-icon mb-30">
                                <input type="text" name="subject" placeholder="Your Subject">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-box message-icon mb-30">
                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                            </div>
                            <div class="contact-btn text-center">
                                <button class="generic-btn red-hover-btn text-uppercase" type="submit">get action</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="ajax-response text-center"></p>
            </div>
        </div>
    </div>
</section>

{{--<section class="contact-form-area pt-100 pb-100">--}}
{{--    <div class="container container-1430">--}}
{{--        <div class="row  service-row">--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="service-box service-box-2">--}}
{{--                    <div class="service-logo text-center">--}}
{{--                        <img src="img/logo/icon-1.jpg" alt="" class="service-img">--}}
{{--                    </div>--}}
{{--                    <div class="service-content text-center">--}}
{{--                        <h6 class="title">Creative Design</h6>--}}
{{--                        <p>Duis autem vel eum iriure dolor in hendrerit vulputate <br> velit esse molestie consequat.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-4">--}}
{{--                <div class="service-box service-box-2">--}}
{{--                    <div class="service-logo text-center">--}}
{{--                        <img src="img/logo/icon-2.jpg" alt="" class="service-img">--}}
{{--                    </div>--}}
{{--                    <div class="service-content text-center">--}}
{{--                        <h6 class="title">Strong Branding</h6>--}}
{{--                        <p>Duis autem vel eum iriure dolor in hendrerit vulputate <br> velit esse molestie consequat.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-4">--}}
{{--                <div class="service-box service-box-2">--}}
{{--                    <div class="service-logo text-center">--}}
{{--                        <img src="img/logo/icon-3.jpg" alt="" class="service-img">--}}
{{--                    </div>--}}
{{--                    <div class="service-content text-center">--}}
{{--                        <h6 class="title">Project Development</h6>--}}
{{--                        <p>Duis autem vel eum iriure dolor in hendrerit vulputate <br> velit esse molestie consequat.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- contact-form-area end -->

@endsection
