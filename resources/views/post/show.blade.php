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
                <div class="col-lg-12 md-mb-50">
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
                                            <span class="duration-feature pr-20">
                                                    <i class="fa fa-clock-o pr-5"></i>
                                                    <span class="label">Reading Time :</span>
                                                    <span class="value"> {{ $post->reading_time ?? 'N/A' }} </span>
                                                </span>
                                            <span class="duration-feature pr-20">
                                                    <i class="fa fa-inr pr-5"></i>
                                                    <span class="label">Hits Counter :</span>
                                                    <span class="value">{{ $post->hits }} </span>
                                                </span>
                                            <span class="students-feature pr-20">
                                                    <i class="fa fa-users pr-5"></i>
                                                    <span class="label">Shared :</span>
                                                    <span class="value">{{ $post->shared }}</span>
                                                </span>
                                            <span class="assessments-feature pr-20">
                                                    <i class="fa fa-check-square-o pr-5"></i>
                                                    <span class="label">Published On :</span>
                                                    <span class="value">{{ $post->created_at->diffForHumans() }}</span>
                                                </span>
{{--                                            @include('shared.social',['type'=>'post','id' => $post->id])--}}
                                            <hr>
                                            <img class="mb-5"
                                            src="{{ Storage::disk('public')->url($post->featured_image) }}" alt="">
                                            {!!  $post->body !!}
                                            <div class="mt-20">
                                                @include('shared.social',['type' =>'post','id' => $post->id])
                                                <div class="mt-3">
                                                    @foreach ($post->tags as $tag)
                                                        <span class="badge rounded-pill text-bg-dark tags">{{$tag->name }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviews -->
                                @auth
                                <comment-component :auth = "{{auth()->user()}}" :post="{{ $post }}"></comment-component>
                                @endauth
                                @guest
                                    @php
                                        session()->put('url.intended', url()->current())
                                    @endphp
                                    <div class="ontent white-bg mt-30">
                                        <div class="inner-box pt-30 pb-30 pl-30 pr-30 white-bg"><h4>Login to post a comment</h4>
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
            </div>
        </div>
    </section>
    <!-- Popular Courses Section End -->
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.8.0/highlight.min.js" integrity="sha512-rdhY3cbXURo13l/WU9VlaRyaIYeJ/KBakckXIvJNAQde8DgpOmE+eZf7ha4vdqVjTtwQt69bD2wH2LXob/LB7Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>hljs.highlightAll();</script>
@endpush
