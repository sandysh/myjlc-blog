@extends('admin.layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Popular Courses</h1>
    </div>
    @include('admin.shared.alert')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('settings.popular.store') }}">
                @csrf
                <div class="row">
                    @foreach($courses as $course)
                        <div class="col-md-4 mb-3 custom-control custom-checkbox">
                            <input
                                name="popular[{{$course->id}}]"
                                type="checkbox"
                                class=""
                                id="popular"
                                aria-describedby="popular"
                                {{ in_array($course->id,$popular) ? 'checked' : '' }}
                            >
                            <label for="popular" class="form-label">{{ $course->title }} ({{$course->category->name}})</label>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
