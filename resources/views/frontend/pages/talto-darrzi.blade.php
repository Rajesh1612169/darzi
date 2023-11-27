@extends('frontend.layouts.app')
@section('content')
    <style>
        .num {
            width: 40px;
            height: 40px;
            background: #40507f;
            border-radius: 50%;
            font-size: 20px;
            line-height: 1;
            letter-spacing: normal;
            text-align: center;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 19px;
        }
    </style>

<section >
    <div class="container container-1430">
        <div class="row">
            <div class="col-md-6">
                <img src="https://cdn.shopify.com/s/files/1/0536/3594/0515/files/Group_34407_a1e1ec6f-5fd2-4d57-8d3a-86076c2bc49c.svg?v=1663240845" alt="">
            </div>
            <div class="col-md-6 pt-5">
                <h2 class="pt-5">Online Personal </h2>
                <h2> Styling Services</h2>
                <p style="font-size: 18px">Special outfit for an event? Complete wardrobe refresh?<br> Our personal stylists are here to help,
                    one-on-one.</p>

                    <a href=""  onclick="Calendly.initPopupWidget({url: 'https://calendly.com/sales-i74'});return false;" class="generic-btn mt-2 red-hover-btn text-uppercase" tabindex="0">
                        Book An Appoinment
                    </a>
            </h2>
            </div>
        </div>
    </div>
</section>

<section style="margin-top: 100px;margin-bottom: 100px">
    <div class="container w-75 ">
        <div class="card p-5" style="background-color: #f8f6f2!important;border-radius: 10px;border: 0">
            <div class="row">
                <div class="col-md-4 text-center">
                    <h6>Get Styled</h6>
                    <p>
                        “I’m confused about how to match my buttons and cuffs to my fabric. Help!”
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <h6>Put a Look Together</h6>
                    <p>
                        “I have a dinner party this weekend and can’t get anything that matches my black jeans. Any ideas?”
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <h6>Get Your Unique Fit</h6>
                    <p>
                        “I'm not sure what my body type is. Can you help me figure it out?”
                    </p>
                </div>
                <div class="col-md-12 text-center">
                    <a class="w-50" style="padding: 16px 92px;
    border-radius: 10px;
    background-color: #dbf1d8;
    font-size: 16px;
    color: #327d31;
    display: block;
    margin: 21px auto 0;">Best of all, it's completely free.</a>
                </div>
            </div>
        </div>
    </div>

</section>

<section style="margin-top: 100px;margin-bottom: 100px">
    <div class="container w-75 ">
        <div class="card p-5" style="background-color: #f8f6f2!important;border-radius: 10px;border: 0">
            <h5 class="text-center mb-4">How It Works</h5>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="num">1</div>
                    <p>
                        Make an appointment.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="num">2</div>
                    <p>
                        Choose a voice callback or a video consultation.
                    </p>
                </div>
                <div class="col-md-4 text-center">
                    <div class="num">3</div>
                    <p>
                        Relax and wait for us to give you a call!
                    </p>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="question-body mb-90">
    <div class="container container-1430">
        <div class="text-center mt-5">
            <h3>FAQs</h3>
            <h6>Below are frequently asked questions, you may find the answer for yourself</h6>
        </div>
        <div class="question-desc">
            <div class="question-collapse mt-50">
                <div class="accordion" id="accordionExample">
                    <div>
                        <div id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn-link btn-block text-left mixitup-control-active collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false">
                                    Mauris congue euismod purus at semper. Morbi et vulputate massa? <i class="fal fa-plus float-right"></i>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
                            <div class="card-body">
                                <p>Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies, elit lorem eleifend lorem</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn-link btn-block text-left collapsed mixitup-control-active" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Donec mattis finibus elit ut tristique? <i class="fal fa-plus float-right"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>Donec mattis finibus elit ut tristique. Nullam tempus nunc eget arcu vulputate, eu porttitor tellus commodo. Aliquam erat volutpat. Aliquam consectetur lorem eu viverra lobortis. Morbi gravida, nisi id fringilla ultricies, elit lorem eleifend lorem

                                </p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn-link btn-block text-left collapsed mixitup-control-active" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Vestibulum a lorem placerat, porttitor urna vel? <i class="fal fa-plus float-right"></i>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
