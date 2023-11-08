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
                                                    <h3>{{ $review->user->name }}</h3>
                                                    <div class="rating star-ratings">
                                                        <span class="ratings" data-rated="{{$review->stars}}">

                                                        </span>
                                                    </div>
                                                    <div class="text"> {{ $review->description }} </div>
{{--                                                    <div class="helpful">Was this review helpful?</div>--}}
{{--                                                    <ul class="like-option">--}}
{{--                                                        <li class="post-positive-review-feedback"--}}
{{--                                                            data-course="{{$course->id}}"--}}
{{--                                                            data-review="{{$review->id}}">--}}
{{--                                                            <i class="fa fa-thumbs-o-up"></i>--}}
{{--                                                        </li>--}}
{{--                                                        <li class="post-negative-review-feedback"--}}
{{--                                                            data-course="{{$course->id}}"--}}
{{--                                                            data-review="{{$review->id}}"--}}
{{--                                                        >--}}
{{--                                                            <i class="fa fa-thumbs-o-down"></i>--}}
{{--                                                        </li>--}}
{{--                                                        <li><a class="report" href="#">Report</a></li>--}}
{{--                                                    </ul>--}}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @auth
                                        @if(!in_array(auth()->id(),($course->reviews->pluck('id')->toArray())))
                                            <div class="ontent white-bg mt-30">
                                                <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg"><h4>Leave A Review</h4>
                                                    <form action="{{ route('courses.review.post',$course->id) }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-lg-6 mb-35 col-md-12 star-rating-system"></div>
                                                            <div class="col-lg-6 mb-35 col-md-12">
                                                                <input type="hidden" id="post-stars" name="stars" value="0">
                                                            </div>
                                                            <div class="col-lg-12 mb-50">
                                                            <textarea rows="10" class="form-control"
                                                                      id="description" name="description"
                                                                      placeholder="Your review here"
                                                                      required=""></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-0">
                                                            <button type="submit" class="btn-part btn readon2 orange-transparent"> Comment
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endauth
                                    @guest
                                        @php
                                            session()->put('url.intended', url()->current())
                                        @endphp
                                        <div class="ontent white-bg mt-30">
                                            <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg"><h4>Login to write a review</h4>
                                                <div class="form-group mb-0">
                                                    <a href="{{ route('login') }}" class="btn readon2 orange-transparent" type="submit" value="Login Now">Login Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endguest
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

{{--                            <div class="notice-bord style1">--}}
{{--                                <h4 class="title">Notice Board</h4>--}}
{{--                                <ul>--}}
{{--                                    <li class="wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms" style="visibility: hidden; animation-duration: 2000ms; animation-delay: 300ms; animation-name: none;">--}}
{{--                                        <div class="date"><span>2</span>Oct</div>--}}
{{--                                        <div class="desc">Attend Free Master Class on Java <br> Timings : 11:30 AM to 1.30 P.M </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="wow fadeInUp" data-wow-delay="400ms" data-wow-duration="2000ms" style="visibility: hidden; animation-duration: 2000ms; animation-delay: 400ms; animation-name: none;">--}}
{{--                                        <div class="date"><span>3</span>Oct</div>--}}
{{--                                        <div class="desc">Attend Free Master Class on Java <br> Timings : 11:30 AM to 1.30 P.M </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms" style="visibility: hidden; animation-duration: 2000ms; animation-delay: 500ms; animation-name: none;">--}}
{{--                                        <div class="date"><span>4</span>Oct</div>--}}
{{--                                        <div class="desc">Attend Free Master Class on Java <br> Timings : 11:30 AM to 1.30 P.M </div>--}}
{{--                                    </li>--}}

{{--                                    <li class="wow fadeInUp" data-wow-delay="600ms" data-wow-duration="2000ms" style="visibility: hidden; animation-duration: 2000ms; animation-delay: 600ms; animation-name: none;">--}}
{{--                                        <div class="date"><span>2</span>Oct</div>--}}
{{--                                        <div class="desc">Array Programs <br> Timings : 10:00 AM to 11.00 A.M </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="wow fadeInUp" data-wow-delay="700ms" data-wow-duration="2000ms" style="visibility: hidden; animation-duration: 2000ms; animation-delay: 700ms; animation-name: none;">--}}
{{--                                        <div class="date"><span>3</span>Oct</div>--}}
{{--                                        <div class="desc">Array Programs <br> Timings : 10:00 AM to 11.00 A.M </div>--}}
{{--                                    </li>--}}


{{--                                </ul>--}}
{{--                            </div>--}}

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
                                                <input class="form-control" type="text" id="email" name="email" placeholder="Email" required="">
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

@push('scripts')
    <script>
        $(function (){
          let totalStars = 5;
          for($i=0;$i<totalStars;$i++) {
              $('.star-rating-system').append(`<span class="fa fa-star" data-star="${$i+1}"></span>`);
          }

          let ratings = $('.ratings');
          let rated = parseInt(ratings.attr('data-rated'));
          for($i=0;$i<totalStars;$i++) {
              if($i<rated){
                  ratings.prepend('<span class="fa fa-star checked"></span>');
              }else {
                  ratings.append('<span class="fa fa-star"></span>');
              }
          }

          $('.fa-star').click(function(e){
              let position = parseInt(e.target.getAttribute('data-star'));
              console.log(position)
              let value =  parseInt($('#post-stars').val());
              if(e.target.classList.contains('checked')){
                  for($i=position+1;$i<=totalStars;$i++) {
                      $(`.fa-star[data-star=${$i}]`).removeClass('checked');
                  }
                  // e.target.classList.remove('checked')
                  $('#post-stars').val(position);
              } else {
                  for($i=0;$i<=position;$i++) {
                    $(`.fa-star[data-star=${$i}]`).addClass('checked');
                  }
                  $('#post-stars').val(position);
              }

          })

            $('.post-positive-review-feedback').click(function (){
                let course = parseInt($(this).attr('data-course'));
                let review = parseInt($(this).attr('data-review'));
                axios.post(`/courses/${course}/review/${review}/feedback`,{type: 'positive'})
                    .then(response => {
                        console.log(response.data);
                    })

            })

        })
    </script>
@endpush
