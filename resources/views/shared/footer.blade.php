<style>
    .social {
        padding: 8px;
        font-size: 30px;
        text-align: center;
        text-decoration: none;
    }

    .fa:hover {
        opacity: 0.7;
    }
    .fa-facebook {
        background: #3B5998;
        color: white;
        padding: 8px 13px 8px 13px;;
    }

    .fa-twitter {
        background: #55ACEE;
        color: white;
    }

    .fa-linkedin {
        background: #007bb5;
        color: white;
    }

    .fa-youtube {
        background: #bb0000;
        color: white;
    }

    .fa-instagram {
        background: #125688;
        color: white;
    }

    .fa-reddit {
        background: #ff5700;
        color: white;
    }

</style>
<div class="rs-newsletter style1 orange-color mb--90 sm-mb-0 sm-pb-70"><div class="container"><div class="newsletter-wrap"><div class="row y-middle"><div class="col-lg-9 col-md-12 md-mb-30"><div class="content-part"><div class="sec-title"><div class="title-icon md-mb-15"><img src="/images/newsletter.png" alt="images"></div><h2 class="title mb-0 white-color">Learn Real-World Programming from the Industry's Best.</h2></div></div></div><div class="col-lg-3 col-md-12"><a class="readon orange-btn main-home" href="https://myjavalearningcenter.com/book-free-demo">Book Free Demo</a></div></div></div></div></div>
<footer id="rs-footer" class="rs-footer home9-style main-home">
    <div class="footer-top">
        <div class="container" id="about">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">
                    <div class="footer-logo mb-30">
                        <a href="https://myjavalearningcenter.com/"><img src="/images/jlc-logo-2.png" alt=""></a>
                    </div>
                      <div class="textwidget white-color pr-60 md-pr-15">
                        <p>Welcome to My Java Learning Center, </p>
                        <p> Our Mission</p>
                        <p> Our mission is simple: To provide Industry-Focused training to students and working professionals.</p>
                      </div>
                      <ul class="footer_social">
                          <a target="_blank" href="https://www.facebook.com/MyJavaLearningCenter" class="social fa fa-facebook"></a>
                          <a target="_blank" href="https://www.instagram.com/myjavalearningcenter" class="social fa fa-instagram"></a>
                          <a target="_blank" href="https://twitter.com/MyJavaLearning" class="social fa fa-twitter"></a>
                          <a target="_blank" href="https://www.linkedin.com/in/myjavalearningcenter" class="social fa fa-linkedin"></a>
                          <a target="_blank" href="https://www.youtube.com/@MyJavaLearningCenter" class="social fa fa-youtube"></a>

                      </ul>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget md-mb-50">
                    <h3 class="widget-title">Address</h3>
                    <ul class="address-widget">
                        <li>
                            <i class="flaticon-location"></i>
                            <div class="desc">No.43, 1st Floor, Maruthi Nilaya, 6th Main, 12th Cross, NS Palya, BTM 2nd Stage, Bangalore – 560076 </div>
                        </li>
                        <li>
                            <i class="flaticon-call"></i>
                            <div class="desc">
                               <a href="tel:+91-7090366699">+91-70903 66699</a>
                            </div>
                        </li>
{{--                        <li>--}}
{{--                            <i class="flaticon-call"></i>--}}
{{--                            <div class="desc">--}}
{{--                               <a href="tel:+91-7090466699">+91-70904 66699</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                        <li>
                            <i class="flaticon-email"></i>
                            <div class="desc">
                                <a href="mailto:hello@myjavalearningcenter.com">hello@myjavalearningcenter.com</a>
                            </div>
                        </li>
                    </ul>
                </div>
                @foreach(array_chunk($topCourses->toArray(),7) as $topCourse)
                <div class="col-lg-3 col-md-12 col-sm-12 pl-50 md-pl-15 footer-widget md-mb-50">
                    <h3 class="widget-title">Courses</h3>
                    <ul class="site-map">
                            @foreach($topCourse as $top)
                                <li><a href="{{ route('courses.show',[$top['slug']]) }}">{{ $top['title'] }}</a> </li>
                            @endforeach
                    </ul>
                </div>
                @endforeach

{{--                <div class="col-lg-3 col-md-12 col-sm-12 footer-widget">--}}
{{--                     <h3 class="widget-title">Useful Links</h3>--}}
{{--                    <ul class="site-map">--}}
{{--                         <li><a href="{{route('privacy.policy')}}">Privacy Policy</a> </li>--}}
{{--                         <li><a href="{{ route('terms.conditions') }}">Terms & Conditions</a> </li>--}}
{{--                         <li><a href="{{route('refund.policy')}}">Refund Policy</a> </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row y-middle">
                <div class="col-md-12 col-lg-12 md-mb-20">
                    <div class="copyright">
                        <p>&copy; 2023 All Rights Reserved By <a href="{{ route('home') }}">My Java Learning Center</a>
                            <a class="ml-8 text-muted" href="{{route('privacy.policy')}}"> |  Privacy Policy |</a>
                            <a class="ml-8 text-muted" href="{{ route('terms.conditions') }}">Terms & Conditions |</a>
                            <a class="ml-8 text-muted" href="{{route('refund.policy')}}">Refund Policy</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
