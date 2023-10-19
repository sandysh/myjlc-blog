@extends('layouts.app')

@section('content')
<div class="main-content">
    <!-- Banner Section Start -->
    @if($banner)
        <div id="rs-banner" class="rs-banner style1" style="background:url({{'storage/'.$banner->image}})">
            <div class="container">
                <div class="banner-content text-center">
                    <h1 class="banner-title capitalize wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="3000ms" style="color:white;">{{ $banner->title }}</h1>
                    <div class="desc mb-35 wow wow fadeInRight" data-wow-delay="900ms" data-wow-duration="3000ms" style="color:white;">{{ $banner->tagline }}</div>
                </div>
            </div>
        </div>
    @else
        <div id="rs-banner" class="rs-banner style1">
            <div class="container">
                <div class="banner-content text-center">
                    <h1 class="banner-title capitalize wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="3000ms" style="color:white;">The Art Of Practical Coding
                    </h1>
                    <div class="desc mb-35 wow wow fadeInRight" data-wow-delay="900ms" data-wow-duration="3000ms" style="color:white;">Learn Real-World Programming from the Industry's Best.
                    </div>
                </div>
            </div>
        </div>
    @endif

    </div>
    <!-- Banner Section End -->

    <!-- About Section Start -->
    <div id="rs-about" class="rs-about style1 pb-100 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 order-last">
                    <div class="notice-bord style1">
                        <h4 class="title">Notice Board</h4>
                        <ul>
                            @foreach($notices as $notice)
                                <li class="wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                                    <div class="date"><span>
                                            {{ explode(',',\Carbon\Carbon::parse($notice->date)->toFormattedDateString())[0] }}</span></div>
                                    <div class="desc">{{ $notice->title }} <br/> Timings : {{ $notice->from }} to
                                    {{ $notice->to }}</div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 pr-50 md-pr-15">
                    <div class="about-part">
                        <div class="sec-title">
                            <div class="sub-title primary wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">About Us</div>
                           <!-- <h2 class="title wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">World Best Virtual Learning Network Educavo eLearning</h2> -->
                            <div class="desc wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms"> In today's rapidly evolving world of technology, staying ahead of the curve is not just an advantage – it's a necessity. Welcome to My Java Learning Center, where we are dedicated to equipping students and working professionals with the skills and knowledge needed to excel in the ever-changing realm of software development.
                            <br><br>We offer courses in Java, Data Structures and Algorithms, Design Patterns and other latest technologies such as Cloud Computing, DevOps for students who want to learn new technologies or working professionals who want to upgrade their technology skills. Our courses are designed and delivered via Instructor-Led live online classes to help you upgrade your skills and choose the right career in technology.
                            <!--
                            <br><br><b>Our Mission</b>
                            <br><br>Our mission is simple: To provide Industry-Focused training to students and working professionals
                            -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Popular Courses Section Start -->
    <div id="rs-popular-courses" class="rs-popular-courses bg6 style1 pt-94 pb-70 md-pt-64 md-pb-40">
        <div class="container">
            <div class="row y-middle mb-50 md-mb-30">
                <div class="col-md-6 sm-mb-30">
                    <div class="sec-title">
                        <div class="sub-title primary">Top Courses</div>
                        <h2 class="title mb-0">Popular Courses</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-part text-end sm-text-start">
                        <a href="/courses" class="readon">View All Courses</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="/images/courses/1.jpg" alt="">
                        </div>
                        <div class="content-part">
                            <ul class="meta-part">

                                <li><span class="price"><i class="fa fa-inr"></i>18,000 + GST</span></li>
                                <li><a class="categorie" href="#">Job Oriented</a></li>
                            </ul>
                            <h3 class="title"><a href="/courses/java-developer-course">Java Developer Course</a></h3>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="user"><i class="fa fa-user"></i> 235</li>

                                    </ul>
                                </div>
                                <div class="btn-part">
                                    <a href="/courses/java-developer-course"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-30 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="/images/courses/2.jpg" alt="">
                        </div>
                        <div class="content-part">
                            <ul class="meta-part">
                                 <li><span class="price"><i class="fa fa-inr"></i>25,000 + GST</span></li>
                                <li><a class="categorie" href="#">Job Oriented</a></li>
                            </ul>
                            <h3 class="title"><a href="/courses/java-full-stack-developer-course">Java Full Stack Developer</a></h3>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="user"><i class="fa fa-user"></i> 245</li>

                                    </ul>
                                </div>
                                <div class="btn-part">
                                    <a href="/courses/java-full-stack-developer-course"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-30 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="/images/courses/3.jpg" alt="">
                        </div>
                        <div class="content-part">
                            <ul class="meta-part">
                                 <li><span class="price"><i class="fa fa-inr"></i>15,000 + GST</span></li>
                                <li><a class="categorie" href="#">DSA</a></li>
                            </ul>
                            <h3 class="title"><a href="/courses/dsa-course">DSA Course</a></h3>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="user"><i class="fa fa-user"></i> 159 </li>

                                    </ul>
                                </div>
                                <div class="btn-part">
                                    <a href="/courses/dsa-course"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="/images/courses/4.jpg" alt="">
                        </div>
                        <div class="content-part">
                            <ul class="meta-part">
                                 <li><span class="price"><i class="fa fa-inr"></i>15,000 + GST</span></li>
                                <li><a class="categorie" href="#">AWS</a></li>
                            </ul>
                            <h3 class="title"><a href="/courses/aws-course">AWS Course</a></h3>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="user"><i class="fa fa-user"></i> 145 </li>

                                    </ul>
                                </div>
                                <div class="btn-part">
                                    <a href="/courses/aws-course"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-30 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="/images/courses/5.jpg" alt="">
                        </div>
                        <div class="content-part">
                            <ul class="meta-part">
                                 <li><span class="price"><i class="fa fa-inr"></i>15,000 + GST</span></li>
                                <li><a class="categorie" href="#">DevOps</a></li>
                            </ul>
                            <h3 class="title"><a href="/courses/devops-course">DevOps Course</a></h3>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="user"><i class="fa fa-user"></i> 194 </li>

                                    </ul>
                                </div>
                                <div class="btn-part">
                                    <a href="/courses/devops-course"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-30 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms">
                    <div class="courses-item">
                        <div class="img-part">
                            <img src="/images/courses/6.jpg" alt="">
                        </div>
                        <div class="content-part">
                            <ul class="meta-part">
                                 <li><span class="price"><i class="fa fa-inr"></i>6,000 + GST</span></li>
                                <li><a class="categorie" href="#">DevOps</a></li>
                            </ul>
                            <h3 class="title"><a href="/courses/kubernetes-course">Kubernetes Course</a></h3>
                            <div class="bottom-part">
                                <div class="info-meta">
                                    <ul>
                                        <li class="user"><i class="fa fa-user"></i> 194 </li>

                                    </ul>
                                </div>
                                <div class="btn-part">
                                    <a href="/courses/kubernetes-course"><i class="flaticon-right-arrow"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Popular Courses Section End -->

    <!-- Faq Section Start -->
    <div class="rs-faq-part style1 pt-100 pb-100 md-pt-70 md-pb-70" id="apply">
        <div class="container">
            <div class="row contact-page-section">
                <div class="col-lg-6 padding-0">
                    <div class="rs-quick-contact new-style">
                        <div class="inner-part mb-50">
                            <h2 class="title mb-15">Book Free Demo</h2>
                            <p>Enroll now and unlock your potential in the realm of software development!</p>
                        </div>
                        <div id="form-messages"></div>
                        <form id="contact-form" method="post" action="/book-demo">
                            <div class="row">
                                <div class="col-lg-6 mb-35 col-md-12">
                                    <input class="from-control" type="text" id="name" name="name" placeholder="Name" required="">
                                </div>
                                <div class="col-lg-6 mb-35 col-md-12">
                                    <input class="from-control" type="text" id="email" name="email" placeholder="Email" required="">
                                </div>
                                <div class="col-lg-6 mb-35 col-md-12">
                                    <input class="from-control" type="text" id="phone" name="phone" placeholder="Phone" required="">
                                </div>
                                <div class="col-lg-6 mb-35 col-md-12">
                                    <select class="from-control form-select" id="course" name="course" data-placeholder="Course Intrested" required="">
                                        <option></option>
                                        <option>Java Developer Course</option>
                                        <option>Java Full Stack Developer Course </option>
                                        <option>DSA Course</option>
                                        <option>AWS Course</option>
                                        <option>DevOps Course</option>
                                        <option>Kubernetes Course</option>
                                        <option>Docker Course</option>
                                        <option>Core Java Course</option>
                                        <option>Web Development Course</option>
                                    </select>
                                </div>

                                <div class="col-lg-12 mb-50">
                                    <textarea class="from-control" id="message" name="message" placeholder=" Message" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <input class="btn-send" type="submit" value="Submit Now">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 padding-0">
                    <div class="img-part media-icon">
                       <!-- <a class="popup-videos" href="https://www.youtube.com/watch?v=atMUy_bPoQI">
                            <i class="fa fa-play"></i>
                        </a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- faq Section End -->

    <!-- Partner Start -->
    <div class="rs-partner md-pb-70">
        <div class="container">
            <div class="sec-title mb-50 md-mb-30 text-center">
                <div class="sub-title primary">Clients</div>
                <h2 class="title mb-0">Where Our Students Work</h2>
            </div>
            <div class="container">
                    @foreach(collect($clients)->chunk(7) as $client)
                    <div class="row" style="margin-bottom: 3em">
                        @foreach($client as $cl)
                            <div class="col">
                                <img src="{{ asset('storage/'.$cl->image) }}" alt="">
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>


{{--            <div class="rs-carousel owl-carousel" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="true" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="5" data-md-device-nav="true" data-md-device-dots="false">--}}
{{--                    <div class="partner-item">--}}
{{--                        <a href="#"><img src="/images/partner/1.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="partner-item">--}}
{{--                        <a href="#"><img src="/images/partner/2.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="partner-item">--}}
{{--                        <a href="#"><img src="/images/partner/3.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="partner-item">--}}
{{--                        <a href="#"><img src="/images/partner/4.png" alt=""></a>--}}
{{--                    </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <!-- Partner End -->

    <!-- Testimonial Section Start -->
    <div class="rs-testimonial home-style1 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title mb-50 md-mb-30 text-center">
                <div class="sub-title primary">Testimonial</div>
                <h2 class="title mb-0">What Students Saying</h2>
            </div>
            <div class="rs-carousel owl-carousel"
                data-loop="true"
                data-items="1"
                data-margin="30"
                data-autoplay="true"
                data-hoverpause="true"
                data-autoplay-timeout="5000"
                data-smart-speed="800"
                data-dots="true"
                data-nav="false"
                data-nav-speed="false"

                data-md-device="1"
                data-md-device-nav="false"
                data-md-device-dots="true"
                data-center-mode="false"

                data-ipad-device2="1"
                data-ipad-device-nav2="false"
                data-ipad-device-dots2="true"

                data-ipad-device="1"
                data-ipad-device-nav="false"
                data-ipad-device-dots="true"

                data-mobile-device="1"
                data-mobile-device-nav="false"
                data-mobile-device-dots="false">
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="/images/testimonial/style5/quote2.png" alt="">Enrolling in the Java Full Stack Developer course at My Java Learning Center was a game-changer for me. The comprehensive curriculum and hands-on approach gave me the confidence to tackle real-world projects. The instructor's guidance was invaluable, and I'm now working as a Java developer, thanks to the skills I gained here.</div>

                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Sarah Thompson</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="/images/testimonial/style5/quote2.png" alt="">I can't recommend My Java Learning Center enough! The Core Java course not only provided a solid foundation but also ignited my passion for programming. The instructor's dedication to teaching and the supportive community of learners made the experience truly exceptional.</div>

                    </div>
                    <div class="author-part">
                        <a class="name" href="#">John Carter</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="/images/testimonial/style5/quote2.png" alt="">I had always been fascinated by technology but had no coding background. My Java Learning Center's Core Java Course was the perfect starting point. The instructor's patient guidance and interactive sessions made learning enjoyable. I now feel equipped to tackle coding challenges head-on.</div>

                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Alex Kim</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="/images/testimonial/style5/quote2.png" alt="">I can't thank My Java Learning Center enough for their DSA course. The instructor's teaching style and step-by-step approach helped me grasp complex algorithms and data structures. I aced my technical interviews and secured a position at my dream company.</div>

                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Jessica Lee</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="/images/testimonial/style5/quote2.png" alt="">II thought learning programming would be overwhelming, but My Java Learning Center proved me wrong. The DevOps course taught me to automate processes and improve collaboration between development and operations teams. It completely changed the way I approach software development.</div>

                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Mark Williams</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
                <div class="testi-item">
                    <div class="author-desc">
                        <div class="desc"><img class="quote" src="/images/testimonial/style5/quote2.png" alt="">As an aspiring full stack developer, the Java Full Stack Developer course exceeded my expectations. The course covered everything from frontend frameworks to backend development. The hands-on projects helped me apply what I learned, and I'm now building web applications with confidence.</div>

                    </div>
                    <div class="author-part">
                        <a class="name" href="#">Jessica Hernandez</a>
                        <span class="designation">Student</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Section End -->

    <!-- Section bg Wrap 2 start -->
    <div class="bg2">
        <!-- Blog Section Start -->
       <!-- <div id="rs-blog" class="rs-blog style1 pt-94 pb-100 md-pt-64 md-pb-70">
            <div class="container">
                <div class="sec-title mb-60 md-mb-30 text-center">
                    <div class="sub-title primary">News Update </div>
                    <h2 class="title mb-0">Latest News & Events</h2>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-12 pr-75 md-pr-15 md-mb-50">
                        <div class="row align-items-center no-gutter white-bg blog-item mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                            <div class="col-md-6">
                                <div class="image-part">
                                    <a href="#"><img src="/images/blog/1.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        <li><i class="fa fa-user-o"></i> Admin</li>
                                        <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                                    </ul>
                                    <h3 class="title"><a href="#">University while the lovely valley team work </a></h3>
                                    <div class="btn-part">
                                        <a class="readon-arrow" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center no-gutter white-bg blog-item mb-30 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">
                            <div class="col-md-6">
                                <div class="image-part">
                                    <a href="#"><img src="/images/blog/2.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        <li><i class="fa fa-user-o"></i> Admin</li>
                                        <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                                    </ul>
                                    <h3 class="title"><a href="#">While The Lovely Valley Team Work</a></h3>
                                    <div class="btn-part">
                                        <a class="readon-arrow" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center no-gutter white-bg blog-item wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms">
                            <div class="col-md-6">
                                <div class="image-part">
                                    <a href="#"><img src="/images/blog/3.jpg" alt=""></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-content">
                                    <ul class="blog-meta">
                                        <li><i class="fa fa-user-o"></i> Admin</li>
                                        <li><i class="fa fa-calendar"></i>June 15, 2019</li>
                                    </ul>
                                    <h3 class="title"><a href="#">Modern School The Lovely Valley Team Work</a></h3>
                                    <div class="btn-part">
                                        <a class="readon-arrow" href="#">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 lg-pl-0">
                        <div class="events-short mb-30 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
                            <div class="date-part">
                                <span class="month">June</span>
                                <div class="date">20</div>
                            </div>
                            <div class="content-part">
                                <div class="categorie">
                                    <a href="#">Math</a> & <a href="#">English</a>
                                </div>
                                <h4 class="title mb-0"><a href="#">Educational Technology and Mobile Learning</a></h4>
                            </div>
                        </div>
                        <div class="events-short mb-30 wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms">
                            <div class="date-part">
                                <span class="month">June</span>
                                <div class="date">21</div>
                            </div>
                            <div class="content-part">
                                <div class="categorie">
                                    <a href="#">Math</a> & <a href="#">English</a>
                                </div>
                                <h4 class="title mb-0"><a href="#">Educational Technology and Mobile Learning</a></h4>
                            </div>
                        </div>
                        <div class="events-short mb-30 wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms">
                            <div class="date-part">
                                <span class="month">June</span>
                                <div class="date">22</div>
                            </div>
                            <div class="content-part">
                                <div class="categorie">
                                    <a href="#">Math</a> & <a href="#">English</a>
                                </div>
                                <h4 class="title mb-0"><a href="#">Educational Technology and Mobile Learning</a></h4>
                            </div>
                        </div>
                        <div class="events-short wow fadeInUp" data-wow-delay="600ms" data-wow-duration="2000ms">
                            <div class="date-part">
                                <span class="month">June</span>
                                <div class="date">23</div>
                            </div>
                            <div class="content-part">
                                <div class="categorie">
                                    <a href="#">Math</a> & <a href="#">English</a>
                                </div>
                                <h4 class="title mb-0"><a href="#">Educational Technology and Mobile Learning</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <!-- Blog Section End -->

        <!-- Newsletter section start -->
        <!-- Newsletter section end -->
    </div>
    <!-- Section bg Wrap 2 End -->
</div>
@endsection
