@extends('layouts.app')
@section('content')
<div class="rs-breadcrumbs breadcrumbs-overlay">
            <div class="breadcrumbs-img">
                <img src="/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
            </div>
            <div class="breadcrumbs-text white-color">
                <h1 class="page-title">Blogs</h1>
                <ul>
                    <li>
                        <a class="active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!-- Popular Courses Section Start -->
        <post-component></post-component>
        <!-- Popular Courses Section End -->
      @endsection
