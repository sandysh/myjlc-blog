@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Review</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Review</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('reviews.update',$review->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="course" class="form-label">Course</label>
                    <select class="form-control" name="course_id" id="">
                        @foreach($courses as $course)
                            <option {{$course->id === $review->course_id ? 'selected' : ''}} value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="name"
                           value="{{$review->name}}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input name="designation" type="text" class="form-control" id="designation"
                           value="{{$review->designation}}"
                           aria-describedby="designation">
                    @error('designation')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <input name="company" type="text" class="form-control" id="company"
                           value="{{$review->company}}"
                           aria-describedby="company">
                    @error('company')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Review</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$review->description}}</textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select class="form-control" name="rating" id="">
                        <option {{ intval($review->rating) === 1 ? 'selected' : '' }} value="1">1 star</option>
                        <option {{ intval($review->rating) === 2 ? 'selected' : '' }} value="2">2 star</option>
                        <option {{ intval($review->rating) === 3 ? 'selected' : '' }} value="3">3 star</option>
                        <option {{ intval($review->rating) === 4 ? 'selected' : '' }} value="4">4 star</option>
                        <option {{ intval($review->rating) === 5 ? 'selected' : '' }} value="5">5 star</option>
                    </select>
                    @error('rating')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input name="active" type="checkbox" class="form-check-input" id="exampleCheck1"
                        {{ $review->active ? 'checked' : '' }}>
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
