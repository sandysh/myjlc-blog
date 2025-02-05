@extends('layouts.app')
@push('styles')
    <style>
        .checked {
            color: orange !important;
        }
        .fa-star {
            font-size: 30px;
        }
    </style>
@endpush
@php
    $title = $course->page_title;
    $description = $course->description;
    $keywords = $course->keywords;
@endphp
@section('content')
    <div class="main-content">
        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="https://myjavalearningcenter.com/public/assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">{{ $course->title }}</h1>
                <ul>
                    <li>
                        <a class="active" href="https://myjavalearningcenter.com/">Home</a>
                    </li>
                    <li>
                        <a class="active" href="https://myjavalearningcenter.com/courses">Course List</a>
                    </li>
                    <li>{{ $course->title }}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Intro Courses -->
        <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 loaded">
            <div class="container">
                <div class="row clearfix">
                    <!-- Content Column -->
                    <div class="col-lg-8 md-mb-50">
                        <!-- Intro Info Tabs-->
                        <div class="intro-info-tabs">
                            <div class="tab-content tabs-content" id="myTabContent">
                                <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel" aria-labelledby="prod-overview-tab">
                                    <div class="content white-bg">
                                        <!-- Cource Overview -->
                                        <div class="course-overview pt-30">
                                            <div class="inner-box">
                                                {!! $course->overview !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content white-bg mt-30">
                                        <!-- Curriculum -->
                                        <div class="course-overview pt-30">
                                            <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg">
                                                <h4>Curriculum</h4>
                                                <div id="faq-accordion" class="accordion">
                                                    @foreach($course->curriculums as $curriculum)
                                                    <div class="card" id="card-{{$curriculum->id}}">
                                                        <div class="card-header"  id="card-header-{{$curriculum->id}}">
                                                            <a class="card-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $curriculum->id }}" area-expanded="true">
                                                                {{ $curriculum->title }}	</a>
                                                        </div>
                                                        <div id="collapse-{{ $curriculum->id }}" class="collapse" data-bs-parent="#faq-accordion">
                                                            <div class="card-body">
                                                                <ul class="review-list">
                                                                    {!! $curriculum->description !!}
                                                                </ul>
{{--                                                                <h3 style="align:right;"> <a href="https://myjavalearningcenter.com/courses/core-java-course">See Detailed Syllabus of Core Java Course</a> </h3>--}}

                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content instructor white-bg mt-30">
                                        <!-- Instructors -->
                                        <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg">
                                            <!-- <h4>Instructors</h4>-->

                                            <h3>Meet Your Expert Trainer</h3>
                                            <p>Srinivas Dande: Empowering Aspiring Developers for Over 18 Years</p>
                                            <p>Srinivas Dande brings over 18 years of rich industry experience to the forefront of software design, development, and training. With a passion for nurturing talent, Srinivas has been a driving force in equipping individuals with the skills they need to succeed in the dynamic world of technology.</p>

                                            <h3>Unveiling the Journey</h3>
                                            <p>Srinivas Dande embarked on his journey in the technology realm with a mission to bridge the gap between aspiring developers and real-world proficiency. Since 2005, he has played a pivotal role in transforming the learning experiences of more than 25,000 students.</p>

                                            <h3>Versatile Expertise</h3>
                                            <p>Srinivas Dande's expertise spans an array of cutting-edge technologies. From crafting full stack solutions to harnessing the power of cloud computing, he has mentored students in diverse disciplines, including:</p>
                                            <ul class="review-list">
                                                <li>Java Full Stack</li>
                                                <li>MERN Stack</li>
                                                <li>MEAN Stack</li>
                                                <li>AWS</li>
                                                <li>DevOps</li>
                                                <li>Python</li>
                                                <li>Big Data and Hadoop</li>
                                                <li>Spark and Scala</li>
                                                <li>Microservices</li>
                                                <li>Data Structures and Algorithms</li>
                                            </ul>
                                            <p>At My Java Learning Center, Srinivas Dande stands as the sole guiding force across all courses. This unique approach ensures that every student receives consistent and comprehensive training across a spectrum of skills. With Srinivas as your mentor, you can dive into the intricacies of multiple disciplines, all under one roof.</p>
                                        </div>
                                    </div>

                                    <!-- Faq -->
                                     <div class="content white-bg mt-30">
                                        <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg">
                                            <h4>Faq</h4>
                                            <div id="faq-accordion" class="accordion">
                                                @foreach($course->activeFaqs as $faq)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <a class="card-link" href="#" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" area-expanded="true">{{ $faq->title }}</a>
                                                        </div>
                                                        <div id="collapse{{$faq->id}}" class="collapse" data-bs-parent="#faq-accordion">
                                                            <div class="card-body">
                                                                {{ $faq->body }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Reviews -->
                                     <div class="content white-bg mt-30">
                                        <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg">
                                            <h4>Reviews</h4>
                                            @foreach($course->reviews as $review)
                                                <div class="cource-review-box mb-30">
                                                    <h3>{{ $review->name }}</h3>
                                                    <p>{{$review->company}} | {{$review->designation}}</p>
                                                    <div class="rating star-ratings">
                                                        @php
                                                            for($i=0; $i<$review->rating; $i++){
                                                                echo '<span class="fa fa-star checked"></span>';
                                                            }
                                                        @endphp
                                                    </div>
                                                    <div class="text"> {{ $review->description }} </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Video Column -->
                    <div class="video-column col-lg-4 rs-about style1">
                        <div class="inner-column">
                            <!-- Video Box -->
                            <div class="intro-video media-icon orange-color2">
                                <img class="video-img" src="{{ '/storage/'.$course->featured_image }}" alt="">
                                <!-- <a class="popup-videos" href="">
                                    <i class="fa fa-play"></i>
                                </a>-->
                                <!--<h4>Preview this course</h4>-->
                            </div>
                            <!-- End Video Box -->
                            <div class="course-features-info">
                                <ul>
                                    <li class="duration-feature">
                                        <i class="fa fa-clock-o"></i>
                                        <span class="label">Hours</span>
                                        <span class="value">{{ $course->hours }} hours </span>
                                    </li>
                                    <li class="duration-feature">
                                        <i class="fa fa-inr"></i>
                                        <span class="label">Price</span>
                                        <span class="value">Rs. {{ $course->price }} + GST </span>
                                    </li>
                                    <li class="students-feature">
                                        <i class="fa fa-users"></i>
                                        <span class="label">Students</span>
                                        <span class="value">{{ $course->students }}</span>
                                    </li>
                                    <li class="lectures-feature">
                                        <i class="fa fa-desktop"></i>
                                        <span class="label">Placements</span>
                                        <span class="value">{{ $course->placements ? 'Yes' : 'No' }}</span>
                                    </li>
                                    <li class="assessments-feature">
                                        <i class="fa fa-check-square-o"></i>
                                        <span class="label">Mode</span>
                                        <span class="value"> {{ $course->class_type }} </span>
                                    </li>
                                </ul>
                            </div>

                            <div class="btn-part">
                                <div class="rs-quick-contact new-style">
                                    <div class="inner-part mb-50">
                                        <h2 class="title mb-15">Book Free Demo</h2>
                                        <p>Enroll now and unlock your potential in the realm of software development!</p>
                                    </div>
                                    <div id="form-messages">
                                        @include('shared.alert')
                                    </div>
                                    <form id="contact-form" method="post" action="{{ route('post.query') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 mb-35 col-md-12">
                                                <input class="form-control" type="text" id="name" name="name" placeholder="Name" required="">
                                            </div>
                                            <div class="col-lg-12 mb-35 col-md-12">
                                                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required="">
                                            </div>
                                            <div class="col-lg-12 mb-35 col-md-12">
                                                <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone" required="">
                                            </div>

                                            <input value="{{ $course->title }}" class="form-control" type="hidden" id="course-name" name="course" placeholder="Phone" required="">

                                            <div class="col-lg-12 mb-50">
                                                <textarea class="form-control" id="message" name="message" placeholder=" Message" required=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <input class="btn readon2 orange-transparent" type="submit" value="Submit Now">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End intro Courses -->
    </div>
@endsection
