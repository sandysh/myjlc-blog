<!--Full width header Start-->
<div class="full-width-header header-style1 home8-style4">
    <!--Header Start-->
    <header id="rs-header" class="rs-header">
        <!-- Topbar Area Start -->
        <div class="topbar-area home8-topbar">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-md-3 topbar-right">

                    </div>
                    <div class="col-md-9 text-end">
                        <ul class="topbar-contact">
                            <li>
                                <i class="flaticon-email"></i>
                                <a href="mailto:hello@myjavalearningcenter.com">hello@myjavalearningcenter.com</a>
                            </li>

                            <li>
                                <span style="margin-right:15px;">
                                    <i class="flaticon-call"></i>
                                    <a href="tel:+91-7090366699">+91-70903 66699</a>
                                </span>
{{--                                <span>--}}
{{--                                    <i class="flaticon-call"></i>--}}
{{--                                    <a href="tel:+91-7090466699">+91-70904 66699</a>--}}
{{--                                </span>--}}

                            </li>
                            @auth
                                <li class="login-register">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button role="button" class="btn btn-link text-muted text-decoration-none" type="submit">
                                            <i class="fa fa-sign-out"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            @else
                                <li class="login-register">
                                    <i class="fa fa-sign-in"></i>
                                    <a href="{{ route('login') }}">Login</a>/<a href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        </ul>
{{--                        <ul class="topbar-right">--}}
{{--                            <li class="btn-part">--}}
{{--                                <a class="apply-btn" href="https://myjavalearningcenter.com/book-free-demo">Book Free Demo</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar Area End -->

        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-2">
                      <div class="logo-cat-wrap">
                          <div class="logo-part">
                              <a href="{{ route('home') }}">
                                  <img src="/images/jlc-logo-1.png" alt="">
                              </a>
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-10 text-end relative">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                              <div class="mobile-menu">
                                  <a class="rs-menu-toggle">
                                      <i class="fa fa-bars"></i>
                                  </a>
                              </div>
                              <nav class="rs-menu">
                                 <ul class="nav-menu">
                                    <li class="rs-mega-menu mega-rs current-menu-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                     <!-- <li>
                                         <a href="#about">About</a>
                                     </li> -->

                                     <li class="menu-item-has-children">
                                         <a href="{{ route('web.courses.index') }}">Courses</a>
                                         <ul class="sub-menu">
                                             @foreach($courses as $course)
                                                 <li><a href="{{ route('courses.show',[$course->slug]) }}">{{ $course->title }}</a> </li>
                                             @endforeach
                                         </ul>
                                     </li>

                                     <li>
                                         <a href="{{ route('blog.index') }}">Blog</a>

                                     </li>

                                     <li>
                                         <a href="{{ route('contact') }}">Contact</a>
                                     </li>
                                 </ul> <!-- //.nav-menu -->
                              </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Canvas Menu start -->
        <nav class="right_menu_togle hidden-md">
            <div class="close-btn">
                <div id="nav-close">
                    <div class="line">
                        <span class="line1"></span><span class="line2"></span>
                    </div>
                </div>
            </div>
            <div class="canvas-logo">
                <a href="index.html"><img src="/images/logo-dark.png" alt="logo"></a>
            </div>
            <div class="offcanvas-text">
                <p>We denounce with righteous indige nationality and dislike men who are so beguiled and demo  by the charms of pleasure of the moment data com so blinded by desire.</p>
            </div>
            <div class="offcanvas-gallery">
                <div class="gallery-img">
                    <a class="image-popup" href="/images/gallery/1.jpg"><img src="/images/gallery/1.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href="/images/gallery/2.jpg"><img src="/images/gallery/2.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href="/images/gallery/3.jpg"><img src="/images/gallery/3.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href="/images/gallery/4.jpg"><img src="/images/gallery/4.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href="/images/gallery/5.jpg"><img src="/images/gallery/5.jpg" alt=""></a>
                </div>
                <div class="gallery-img">
                    <a class="image-popup" href="/images/gallery/6.jpg"><img src="/images/gallery/6.jpg" alt=""></a>
                </div>
            </div>
            <div class="map-img">
                <img src="/images/map.jpg" alt="">
            </div>
            <div class="canvas-contact">
                <ul class="social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </nav>
        <!-- Canvas Menu end -->
    </header>
    <!--Header End-->
</div>
