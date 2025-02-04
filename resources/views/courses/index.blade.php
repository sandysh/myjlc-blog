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
    <course-component :categories="{{$categories}}"></course-component>
@endsection
