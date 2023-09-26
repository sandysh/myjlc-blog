@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/styles/a11y-dark.min.css" integrity="sha512-Vj6gPCk8EZlqnoveEyuGyYaWZ1+jyjMPg8g4shwyyNlRQl6d3L9At02ZHQr5K6s5duZl/+YKMnM3/8pDhoUphg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        input, textarea {
            background: white !important;
            padding: 10px !important;
        }
        .tags-info {
            margin: 50px 0;
            border-radius: 3px;
            /* padding: 30px 40px 30px; */
            background: #ffffff;
            box-shadow: 0 0 30px #eee;
            padding: 8px 5px 0px 5px !important;
        }
        .intro-section .video-column .course-features-info {
            margin: 0px 0;
        }
    </style>
@endpush
@php
    $post->update(['hits' => $post->hits + 1]);
@endphp
@section('content')
    <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
            <img src="/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
            <h1 class="page-title">{{ $post->title  }}</h1>
            <ul>
                <li>
                    <a class="active" href="https://myjavalearningcenter.com/">Home</a>
                </li>
                <li>Blog</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Popular Courses Section Start -->
    <section class="intro-section gray-bg pt-94 pb-100 md-pt-64 md-pb-70 loaded">
        <div class="container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="col-lg-8 md-mb-50">
                    <!-- Intro Info Tabs-->
                    <div class="intro-info-tabs">
                        <div class="tab-content tabs-content" id="myTabContent">
                            <div class="tab-pane tab fade show active" id="prod-overview" role="tabpanel"
                                aria-labelledby="prod-overview-tab">
                                <div class="content white-bg">
                                    <!-- Cource Overview -->
                                    <div class="course-overview pt-30">
                                        <div class="inner-box">
                                            {{-- <i class="fa fa-thumbs-up"></i> --}}
                                            @include('shared.social',['type'=>'post','id' => $post->id])
                                            <hr>
                                            <img class="mb-5"
                                            src="{{ Storage::disk('public')->url($post->featured_image) }}" alt="">
                                            {!!  $post->body !!}
                                            <div class="mt-20">
                                                @include('shared.social',['type' =>'post','id' => $post->id])
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <!-- Reviews -->
                                
                                <comment-component :auth = "{{auth()->user()}}" :post="{{ $post }}"></comment-component>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Video Column -->
                <div class="video-column col-lg-4 rs-about style1">
                    <div class="inner-column">
                        <!-- Video Box -->
                        

                        <!-- End Video Box -->
                        <div class="course-features-info">
                            <ul>
                                <li class="duration-feature">
                                    <i class="fa fa-clock-o"></i>
                                    <span class="label">Reading Time</span>
                                    <span class="value"> {{ $post->reading_time ?? 'N/A' }} </span>
                                </li>
                                <li class="duration-feature">
                                    <i class="fa fa-inr"></i>
                                    <span class="label">Hits Counter</span>
                                    <span class="value">{{ $post->hits }} </span>
                                </li>
                                <li class="students-feature">
                                    <i class="fa fa-users"></i>
                                    <span class="label">Shared</span>
                                    <span class="value">{{ $post->shared }}</span>
                                </li>
                                <li class="assessments-feature">
                                    <i class="fa fa-check-square-o"></i>
                                    <span class="label">Published On</span>
                                    <span class="value">{{ $post->created_at->diffForHumans() }}</span>
                                </li>
                                {{-- <li class="lectures-feature">
                                    <i class="fa fa-desktop"></i>
                                    <span class="label">Placements</span>
                                    <span class="value">No</span>
                                </li> --}}
                            </ul>
                        </div>

                        <div class="tags-info">
                            @foreach ($post->tags as $tag)
                                <span class="badge rounded-pill text-bg-dark tags">{{$tag->name }}</span>
                            @endforeach
                        </div>

                        <div class="notice-bord style1">
                            <h4 class="title">Notice Board</h4>
                            <ul>

                                <li class="wow fadeInUp" data-wow-delay="500ms" data-wow-duration="2000ms"
                                    style="visibility: visible; animation-duration: 2000ms; animation-delay: 500ms; animation-name: fadeInUp;">
                                    <div class="date"><span>25</span>Sept</div>
                                    <div class="desc">DSA Demo Class starts from 9.00 A.M</div>
                                </li>
                                <li class="wow fadeInUp" data-wow-delay="600ms" data-wow-duration="2000ms"
                                    style="visibility: visible; animation-duration: 2000ms; animation-delay: 600ms; animation-name: fadeInUp;">
                                    <div class="date"><span>26</span>Sept</div>
                                    <div class="desc">DSA Demo Class starts from 9.00 A.M</div>
                                </li>
                                <li class="wow fadeInUp" data-wow-delay="700ms" data-wow-duration="2000ms"
                                    style="visibility: visible; animation-duration: 2000ms; animation-delay: 700ms; animation-name: fadeInUp;">
                                    <div class="date"><span>27</span>Sept</div>
                                    <div class="desc">DSA Demo Class starts from 9.00 A.M</div>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-part">
                            <a href="https://myjavalearningcenter.com/book-free-demo"
                                class="btn readon2 orange-transparent">Book Free Demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                <h2 class="title mb-0 white-color">Learn Real-World Programming from the Industry's Best.
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <a class="readon orange-btn main-home" href="https://myjavalearningcenter.com/book-free-demo">Book
                            Free Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Newsletter section end -->
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js" integrity="sha512-rdhY3cbXURo13l/WU9VlaRyaIYeJ/KBakckXIvJNAQde8DgpOmE+eZf7ha4vdqVjTtwQt69bD2wH2LXob/LB7Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>hljs.highlightAll();</script>
@endpush
