@extends('layouts.app')
@section('content')
<div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Course List</h1>
                <ul>
                    <li>
                        <a class="active" href="https://myjavalearningcenter.com/">Home</a>
                    </li>
                    <li>Courses</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <post-component></post-component>
        <!-- Popular Courses Section End -->
        <!-- Newsletter section start -->
        <div class="rs-newsletter style1 orange-color mb--90 sm-mb-0 sm-pb-70">
            <div class="container">
                <div class="newsletter-wrap">
                    <div class="row y-middle">
                        <div class="col-lg-9 col-md-12 md-mb-30">
                            <div class="content-part">
                                <div class="sec-title">
                                    <div class="title-icon md-mb-15">
                                        <img src="/images/newsletter.png" alt="images">
                                    </div>
                                    <h2 class="title mb-0 white-color">Learn Real-World Programming from the Industry's Best.</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <a class="readon orange-btn main-home" href="https://myjavalearningcenter.com/book-free-demo">Book Free Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Newsletter section end -->
@endsection