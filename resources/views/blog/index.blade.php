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
        <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container">
                <div class="gridFilter text-center mb-50">
                    <button class="active" data-filter="*">All </button>
                    <button data-filter=".filter1">Job Oriented </button>
                    <button data-filter=".filter2">JAVA </button>
                    <button data-filter=".filter3">DSA </button>
                    <button data-filter=".filter4">DevOps </button>
                    <button data-filter=".filter5">AWS </button>
                    <button data-filter=".filter6">Web </button>
                </div>
                <div class="row grid">
                    <div class="col-lg-4 col-md-6 grid-item filter1 filter2">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/1.jpg" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>18,000 + GST</span></li>
                                    <li><a class="categorie" href="#">Job Oriented</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/java-developer-course">Java Developer Course</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 235</li>

                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/java-developer-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item filter2 filter1">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/2.jpg" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>30,000 + GST</span></li>
                                    <li><a class="categorie" href="#">Job Oriented</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/java-full-stack-developer-course">Java Full Stack Developer</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 245</li>

                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/java-full-stack-developer-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item filter3">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/3.jpg" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>15,000 + GST</span></li>
                                    <li><a class="categorie" href="#">DSA</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/dsa-course">DSA Course</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 159 </li>

                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/dsa-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item filter5">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/4.jpg" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>15,000 + GST</span></li>
                                    <li><a class="categorie" href="#">AWS</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/aws-course">AWS Course</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 145 </li>

                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/aws-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item filter4">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/5.jpg" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>15,000 + GST</span></li>
                                    <li><a class="categorie" href="#">DevOps</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/devops-course">DevOps Course</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 194 </li>

                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/devops-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item filter4">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/6.jpg" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>6,000 + GST</span></li>
                                    <li><a class="categorie" href="#">DevOps</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/kubernetes-course">Kubernetes Course</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 194 </li>
                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/kubernetes-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item filter4">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/7.png" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>5,000 + GST</span></li>
                                    <li><a class="categorie" href="#">DevOps</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/docker-course">Docker Course</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 194 </li>

                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/docker-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item filter2">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/8.png" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>10,000 + GST</span></li>
                                    <li><a class="categorie" href="#">Java</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/core-java-course">Core Java Course</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 225</li>

                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/core-java-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 grid-item filter6">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="/images/courses/9.png" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>6,000 + GST</span></li>
                                    <li><a class="categorie" href="#">Web Development</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/web-development-course">Web Development Course</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> 294 </li>
                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/web-development-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="pagination-area orange-color text-center mt-30 md-mt-0">
                        <ul class="pagination-part">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">Next <i class="fa fa-long-arrow-right"></i></a></li>
                        </ul>
                    </div> -->
            </div>
        </div>
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