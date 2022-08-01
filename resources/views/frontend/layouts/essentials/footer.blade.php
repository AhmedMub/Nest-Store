<footer class="main">
    <section class="newsletter mb-15 wow animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="position-relative newsletter-inner">
                        <div class="newsletter-content">
                            <h2 class="mb-20">
                                {{__('frontend/footer.Stay home & get your daily')}} <br />
                                {{__('frontend/footer.needs from our shop')}}
                            </h2>
                            <p class="mb-45">{{__('frontend/footer.Start You\'r Daily Shopping with')}} <span
                                    class="text-brand">{{__('frontend/footer.Nest Mart')}}</span>
                            </p>
                            <form class="form-subcriber d-flex">
                                <input type="email" placeholder="Your emaill address" />
                                <a class="d-inline-flex" href="{{route('home')}}"><button class="btn"
                                        type="submit">{{__('frontend/footer.Subscribe')}}</button></a>
                            </form>
                        </div>
                        <img src={{asset("frontend/assets/defaultImages/banner-9.png")}} alt="newsletter" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="banner-icon">
                            <img src={{asset("frontend/assets/imgs/theme/icons/icon-1.svg")}} alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('frontend/footer.Best prices & offers')}}</h3>
                            <p>{{__('frontend/footer.Orders $50 or more')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".1s">
                        <div class="banner-icon">
                            <img src={{asset("frontend/assets/imgs/theme/icons/icon-2.svg")}} alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('frontend/footer.Free delivery')}}</h3>
                            <p>{{__('frontend/footer.24/7 amazing services')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".2s">
                        <div class="banner-icon">
                            <img src={{asset("frontend/assets/imgs/theme/icons/icon-3.svg")}} alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('frontend/footer.Great daily deal')}}</h3>
                            <p>When you sign up</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".3s">
                        <div class="banner-icon">
                            <img src={{asset("frontend/assets/imgs/theme/icons/icon-4.svg")}} alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('frontend/footer.Wide assortment')}}</h3>
                            <p>{{__('frontend/footer.Mega Discounts')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".4s">
                        <div class="banner-icon">
                            <img src={{asset("frontend/assets/imgs/theme/icons/icon-5.svg")}} alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('frontend/footer.Easy returns')}}</h3>
                            <p>{{__('frontend/footer.Within 30 days')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                    <div class="banner-left-icon d-flex align-items-center wow animate__animated animate__fadeInUp"
                        data-wow-delay=".5s">
                        <div class="banner-icon">
                            <img src={{asset("frontend/assets/imgs/theme/icons/icon-6.svg")}} alt="" />
                        </div>
                        <div class="banner-text">
                            <h3 class="icon-box-title">{{__('frontend/footer.Safe delivery')}}</h3>
                            <p>{{__('frontend/footer.Within 30 days')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp"
                        data-wow-delay="0">
                        <div class="logo mb-30">
                            <a href="index.html" class="mb-15"><img src={{asset("frontend/assets/imgs/theme/logo.svg")}}
                                    alt="logo" /></a>
                            <p class="font-lg text-heading">
                                {{__('frontend/footer.Awesome grocery store website template')}}</p>
                        </div>
                        <ul class="contact-infor">
                            <li><img src={{asset("frontend/assets/imgs/theme/icons/icon-location.svg")}}
                                    alt="" /><strong>{{__('frontend/footer.Address')}}: </strong>
                                <span>
                                    {{__('frontend/footer.5171 W Kent, Utah 53127 United States')}}
                                </span>
                            </li>
                            <li><img src={{asset("frontend/assets/imgs/theme/icons/icon-contact.svg")}}
                                    alt="" /><strong>
                                    {{__('frontend/footer.Call Us')}}:</strong><span>(+91) - 540-025-124553</span></li>
                            <li><img src={{asset("frontend/assets/imgs/theme/icons/icon-email-2.svg")}}
                                    alt="" /><strong>{{__('frontend/footer.Email')}}:</strong><span>sale@Nest.com</span>
                            </li>
                            <li><img src={{asset("frontend/assets/imgs/theme/icons/icon-clock.svg")}}
                                    alt="" /><strong>{{__('frontend/footer.Hours')}}:</strong><span>10:00 - 18:00, Mon -
                                    Sat</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s>
                <h4 class=" widget-title">Company</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="javascript:void(0)">About Us</a></li>
                        <li><a href="javascript:void(0)">Delivery Information</a></li>
                        <li><a href="javascript:void(0)">Privacy Policy</a></li>
                        <li><a href="javascript:void(0)">Terms &amp; Conditions</a></li>
                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><a href="javascript:void(0)">Support Center</a></li>
                        <li><a href="javascript:void(0)">Careers</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                    <h4 class="widget-title">Account</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="{{route('user.profile')}}">Sign In</a></li>
                        <li><a href="{{route('user.profile')}}">View Cart</a></li>
                        <li><a href="{{route('user.profile')}}">My Wishlist</a></li>
                        <li><a href="{{route('user.profile')}}">Track My Order</a></li>
                        <li><a href="{{route('user.profile')}}">Help Ticket</a></li>
                        <li><a href="{{route('user.profile')}}">Shipping Details</a></li>
                        <li><a href="{{route('user.profile')}}">Compare products</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title">Corporate</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="javascript:void(0)">Become a Vendor</a></li>
                        <li><a href="javascript:void(0)">Affiliate Program</a></li>
                        <li><a href="javascript:void(0)">Farm Business</a></li>
                        <li><a href="javascript:void(0)">Farm Careers</a></li>
                        <li><a href="javascript:void(0)">Our Suppliers</a></li>
                        <li><a href="javascript:void(0)">Accessibility</a></li>
                        <li><a href="javascript:void(0)">Promotions</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                    <h4 class="widget-title">Popular</h4>
                    <ul class="footer-list mb-sm-5 mb-md-0">
                        <li><a href="javascript:void(0)">Milk & Flavoured Milk</a></li>
                        <li><a href="javascript:void(0)">Butter and Margarine</a></li>
                        <li><a href="javascript:void(0)">Eggs Substitutes</a></li>
                        <li><a href="javascript:void(0)">Marmalades</a></li>
                        <li><a href="javascript:void(0)">Sour Cream and Dips</a></li>
                        <li><a href="javascript:void(0)">Tea & Kombucha</a></li>
                        <li><a href="javascript:void(0)">Cheese</a></li>
                    </ul>
                </div>
                <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp"
                    data-wow-delay=".5s">
                    <h4 class="widget-title">Install App</h4>
                    <p class="">From App Store or Google Play</p>
                    <div class="download-app">
                        <a href="javascript:void(0)" class="hover-up mb-sm-2 mb-lg-0"><img class="active"
                                src={{asset("frontend/assets/imgs/theme/app-store.jpg")}} alt="" /></a>
                        <a href="javascript:void(0)" class="hover-up mb-sm-2"><img
                                src={{asset("frontend/assets/imgs/theme/google-play.jpg")}} alt="" /></a>
                    </div>
                    <p class="mb-20">Secured Payment Gateways</p>
                    <img class="" src={{asset("frontend/assets/imgs/theme/payment-method.png")}} alt="" />
                </div>
            </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <p class="font-sm mb-0">&copy; {{date('Y')}}, <strong class="text-brand">Nest Mart</strong> Made With <i
                        class="fa-solid fa-heart text-danger"></i>

                    By <a href="https://mubarak.codes" target="_blank">Mubarak</a><br />All rights reserved
                </p>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src={{asset("frontend/assets/imgs/theme/icons/phone-call.svg")}} alt="hotline" />
                    <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
                </div>
                <div class="hotline d-lg-inline-flex">
                    <img src={{asset("frontend/assets/imgs/theme/icons/phone-call.svg")}} alt="hotline" />
                    <p>1900 - 8888<span>24/7 Support Center</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>Follow Us</h6>
                    <a href="javascript:void(0)"><img
                            src={{asset("frontend/assets/imgs/theme/icons/icon-facebook-white.svg")}} alt="" /></a>
                    <a href="javascript:void(0)"><img
                            src={{asset("frontend/assets/imgs/theme/icons/icon-twitter-white.svg")}} alt="" /></a>
                    <a href="javascript:void(0)"><img
                            src={{asset("frontend/assets/imgs/theme/icons/icon-instagram-white.svg")}} alt="" /></a>
                    <a href="javascript:void(0)"><img
                            src={{asset("frontend/assets/imgs/theme/icons/icon-pinterest-white.svg")}} alt="" /></a>
                    <a href="javascript:void(0)"><img
                            src={{asset("frontend/assets/imgs/theme/icons/icon-youtube-white.svg")}} alt="" /></a>
                </div>
                <p class="font-sm">Up to 15% discount on your first subscribe</p>
            </div>
        </div>
    </div>
</footer>
