@extends('layouts.app')

@section('content')
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="https://myjavalearningcenter.com/public/assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
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
    <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="gridFilter text-center mb-50">
                <button class="active" data-filter="*">All </button>
                @foreach($categories as $category)
                    <button data-filter=".filter1">{{ $category->name }} </button>
                @endforeach
            </div>
            <div class="row grid" style="position: relative; height: 1374.26px;">
                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-6 grid-item {{$course->slug}}" style="position: absolute; left: 0%; top: 0px;">
                        <div class="courses-item mb-30">
                            <div class="img-part">
                                <img src="https://myjavalearningcenter.com/public/assets/images/courses/1.jpg" alt="">
                            </div>
                            <div class="content-part">
                                <ul class="meta-part">
                                    <li><span class="price"><i class="fa fa-inr"></i>{{ $course->price }} + GST</span></li>
                                    <li><a class="categorie" href="#">{{ $course->category->name }}</a></li>
                                </ul>
                                <h3 class="title"><a href="https://myjavalearningcenter.com/courses/java-developer-course">{{ $course->title }}</a></h3>
                                <div class="bottom-part">
                                    <div class="info-meta">
                                        <ul>
                                            <li class="user"><i class="fa fa-user"></i> {{ $course->students }}</li>

                                        </ul>
                                    </div>
                                    <div class="btn-part">
                                        <a href="https://myjavalearningcenter.com/courses/java-developer-course"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
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
@endsection
